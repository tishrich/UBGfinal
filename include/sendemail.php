<?php
require_once('phpmailer/class.phpmailer.php');

$mail = new PHPMailer();

if( isset( $_POST['contactform-submit'] ) AND $_POST['contactform-submit'] == 'submit' ) {
    if( $_POST['contactform-name'] != '' AND $_POST['contactform-email'] != '' AND $_POST['contactform-message'] != '' ) {

        $name = $_POST['contactform-name'];
        $email = $_POST['contactform-email'];
        $phone = $_POST['contactform-phone'];
        $service = $_POST['contactform-service'];
        $subject = $_POST['contactform-subject'];
        $message = $_POST['contactform-message'];

        $subject = isset($subject) ? '' : 'New Message From ubgrealestate.com Contact Form';

        $botcheck = $_POST['contactform-botcheck'];

        $toemail = 'tishanarichards@ubgrealestate.com'; //email
        $toname = 'United Brokers Group'; // name

        if( $botcheck == '' ) {

            $mail->SetFrom( $email , $name );
            $mail->AddReplyTo( $email , $name );
            $mail->AddAddress( $toemail , $toname );
            $mail->Subject = $subject;

            $name = isset($name) ? "Name: $name<br><br>" : '';
            $email = isset($email) ? "Email: $email<br><br>" : '';
            $phone = isset($phone) ? "Phone: $phone<br><br>" : '';
            $service = isset($service) ? "Service: $service<br><br>" : '';
            $message = isset($message) ? "Message: $message<br><br>" : '';

            $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';

            $body = "$name $email $phone $service $message $referrer";

            $mail->MsgHTML( $body );
            $sendEmail = $mail->Send();

            if( $sendEmail == true ):
                echo 'We have <strong>successfully</strong> received your message and an agent will be in contact with you soon.';
            else:
                echo 'Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '';
            endif;
        } else {
            echo 'Bot <strong>Detected</strong>.! Clean yourself Botster.!';
        }
    } else {
        echo 'Please <strong>Fill up</strong> all the Fields and Try Again.';
    }
} else {
    echo 'An <strong>unexpected error</strong> occured. Please Try Again later.';
}

?>

