<?php

require __DIR__ . '/../../vendor/autoload.php';

/**
 * Mail class: This class talks to the mailing API to send emails from the program.
 */
class Mail {

    /**
     * Send method: This is used to send an email message to a specified user.
     *
     * @author Christopher Thacker
     */
    public static function send($_to, $_subject, $_text, $_html) {

    }

    public static function sendTestEmail() {
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("noreply@example.com", "noreply");
        $email->setSubject("Sending with Twilio SendGrid is Fun");
        $email->addTo("csteven015@gmail.com", "Christopher");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );
        $api = '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';
        $sendgrid = new \SendGrid($api);
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }
}