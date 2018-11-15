<p>Boo</p>

<?php

/*  
 *  Backend for automated email sending, using base php mail funciton.
 * 
 *  @version 11/5/2018
 *  @author Andrew Sihoo Son
 */

// Pear Mail Library
require_once "vendor/pear/mail/Mail.php";

$from = '<sona.351n@gmail.com>';
$to = '<sona.351n@gmail.com>';
$subject = 'Hi!';
$body = "Hi,\n\nHow are you?";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'sona.351n@gmail.com',
        'password' => 'Maple351*'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}
?> 
