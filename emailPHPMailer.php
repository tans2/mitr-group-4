<?php
use PHPMailer\PHPMailer\PHPMailer;

/*  
 *  Backend for automated email sending.
 * 
 *  @version 11/5/2018
 *  @author Andrew Sihoo Son
 */

require './vendor/autoload.php';

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

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

$mail = new PHPMAILER;

$sender = 'sona.351n@gmail.com';

$mail->isSMTP();
$mail->host = gethostbyname('smtp.gmail.com');
$mail->SMTPAuth = true;
$mail->Username = $sender;
$mail->Password = 'Maple351*';
$mail->SMTPSecure - 'ssl';
$mail->Port = 465;

$mail->setFrom($sender, 'Test');
$mail->addAddress($sender, 'Andy');

$mail->isHTML(true);

$mail->Subject = 'Test Email';
$mail->Body = 'This is a test email.';

if(!$mail->send()){
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>

<p>Hello World!!!</p>