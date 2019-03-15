<?php
//session_start();
//
//header('Content-type: application/json');
//
//require_once('../models/GoogleApi.php');
//
//try {
//
//	//This grabs the details of an event to be created.
//	$event = $_POST['event_details'];
//
//	$cal = new GoogleApi();
//
//	//This retrieves the timezone of the calendar that we are adding an event to.
//	$user_timezone = $cal->GetUserCalendarTimezone($_SESSION['access_token']);
//
//	//This creates the calendar event. The user's primary calendar is being used currently for simplicity.
//	$event_id = $cal->CreateCalendarEvent('primary', $event['title'], $event['all_day'], $event['event_time'], $user_timezone, $_SESSION['access_token']);
//
//	echo json_encode([ 'event_id' => $event_id ]);
//}
//catch(Exception $e) {
//	header('Bad Request', true, 400);
//    echo json_encode(array( 'error' => 1, 'message' => $e->getMessage() ));
//}
//
//?>