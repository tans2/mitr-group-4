<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/*  
 *  Backend for automated email sending.
 * 
 *  @version 11/5/2018
 *  @author Andrew Sihoo Son
 */

require 'PHPMailerAutoload.php';

$host = "192.168.64.2";
$user = "username";
$password = "password";
$database = "mitr";

// Create connection
$mysqli = mysqli_connect($host, $user, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

class message{
    $mail = new PHPMAILER;

    $mail->isSMTP();
    $mail->host = '';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
    $mail->SMTPSecure - 'tls';
    $mail->Port =;

    $mail->setFrom = '';
    $mail->addBCC();

    $mail->isHTML(true);

    $mail->Subject = '';
    $mail->Body = '';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}

?>