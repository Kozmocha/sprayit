<?php
require_once __DIR__ . '/app/gm_setup.php';
//This class is used to make the API calls to Google and handles events such as login and calendar manipulation.
class GoogleApi {

    public function testCheck(){
        return true;
    }
    //Function used to grab an access token using the credentials data and the authorization code provided by Google for the user.
    public function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {
        try{
            $client = new Google_Client();
            //check if google is sending back a code
            if(isset($_GET['code'])){
                $client->fetchAccessTokenWithAuthCode($_GET['code']);

                if($client->getAccessToken()){
                    $_SESSION['google_access_token'] = $client->getAccessToken();
                    $user = $client->verifyIdToken();

                    $exists = $db->prepare("SELECT * FROM users WHERE provider_id = :pid OR email = :email");
                    $user['email'] != "" ? $email = $user['email'] : $email = "xxxx";
                    $exists->execute([':pid' => $user['sub'], ':email' => $email]);

                    if($rs = $exists->fetch()){
                        $_SESSION['username'] = $rs['username'];
                        $_SESSION['id'] = $rs['id'];

                        if(isset($_SESSION['errors'])) unset($_SESSION['errors']);
                        header('Location: index.php');
                    }
                    //register user
                    else{
                        $insertQuery = "INSERT INTO users (username, email, provider, provider_id, avatar)
                        VALUES(:username, :email, :provider, :provider_id, :avatar)";

                        $statement = $db->prepare($insertQuery);

                        $statement->execute([
                            ':username' => $user['name'], ':email' => $user['email'], ':provider' => 'Google',
                            ':provider_id' => $user['sub'], ':avatar' => $user['picture']
                        ]);

                        if($statement->rowCount() == 1) {
                            $_SESSION['username'] = $user['name'];
                            $_SESSION['id'] = $user['sub'];

                            if(isset($_SESSION['errors'])) unset($_SESSION['errors']);
                            header('Location: index.php');
                        }
                    }
                }
            }
        }catch (PDOException $ex){
            $errors = "PDO Error: " . $ex->getMessage();
        }catch (Exception $ex){
            $errors = "General Exception: " . $ex->getMessage();
        }

        if($errors != ''){
            $_SESSION['errors'] = $errors;
            header('Location: index.php');
        }
    }

    //Function that gets the user's calendar's timezone; this information is accessed with an access token.
    public function GetUserCalendarTimezone($access_token) {
        $url_settings = 'https://www.googleapis.com/calendar/v3/users/me/settings/timezone';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_settings);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code != 200)
            throw new Exception('Error : Could not get timezone');

        return $data['value'];
    }

    //Function that gets a list of the user's available calendars; this information is accessed with an access token.
    public function GetCalendarsList($access_token) {
        $url_parameters = array();

        $url_parameters['fields'] = 'items(id,summary,timeZone)';
        $url_parameters['minAccessRole'] = 'owner';

        $url_calendars = 'https://www.googleapis.com/calendar/v3/users/me/calendarList?' . http_build_query($url_parameters);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_calendars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code != 200)
            throw new Exception('Error : Could not get calendars list');

        return $data['items'];
    }

    //Function that passes user-defined data through the Google API to create an event for the specified calendar; this information is accessed with an access token.
    public function CreateCalendarEvent($calendar_id, $summary, $all_day, $event_time, $event_timezone, $access_token) {
        $url_events = 'https://www.googleapis.com/calendar/v3/calendars/' . $calendar_id . '/events';

        $curlPost = array('summary' => $summary);
        if ($all_day == 1) {
            $curlPost['start'] = array('date' => $event_time['event_date']);
            $curlPost['end'] = array('date' => $event_time['event_date']);
        } else {
            $curlPost['start'] = array('dateTime' => $event_time['start_time'], 'timeZone' => $event_timezone);
            $curlPost['end'] = array('dateTime' => $event_time['end_time'], 'timeZone' => $event_timezone);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_events);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token, 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($curlPost));
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code != 200)
            throw new Exception('Error : Could not create event');

        return $data['id'];
    }
}

?>