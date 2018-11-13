<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/*  
 *  Backend for automated email sending.
 * 
 *  @version 11/5/2018
 *  @author Andrew Sihoo Son
 */

require 'vendor/autoload.php';

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

$email = mysql_query('query');

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    $mail = new PHPMAILER;

    $mail->isSMTP();
    $mail->host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sona.351n@gmail.com';
    $mail->Password = 'Maple351*';
    $mail->SMTPSecure - 'tls';
    $mail->Port = 587;
	
    $mail->setFrom = ('sona.351n@gmail.com','Test');
    $mail->addAddress('sona.351n@gmail.com', 'Andy');
	
    $mail->isHTML(true);

    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a test email.';

	$mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>