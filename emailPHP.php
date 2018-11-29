<?php
require "vendor/phpmailer/phpmailer/src/PHPMailer.php";
require "vendor/phpmailer/phpmailer/src/SMTP.php";
use PHPMailer\PHPMailer\PHPmailer;
require_once "vendor/autoload.php";

/*  
 *  Backend for automated email sending.
 * 
 *  @version 11/27/2018
 *  @author Andrew Sihoo Son
 */

//$host = "192.168.64.2";
//$user = "username";
//$password = "password";
//$database = "mitr";

// Create connection
//$mysqli = mysqli_connect($host, $user, $password, $database);

// Check connection
//if ($mysqli->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}

//$email = mysql_query('query');

$mail = new PHPMailer;

//Enable SMTP debugging. 
//$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "afrotcdet550@gmail.com";                 
$mail->Password = "silverfalcons550";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = "afrotcdet550@gmail.com";
$mail->FromName = "Airforce ROTC Detatchment 550";

$mail->addAddress("jmessare46@gmail.com", "Joe Messare");

$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}