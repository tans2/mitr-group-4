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
function send($addresses, $subject, $body){
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

    $arrlength = count($addresses);

    for($x = 0; $x < $arrlength; $x++) {
        $mail->addAddress($addresses[$x]);
    }

    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody = Html2Text\Html2Text::convert($body);

    if(!$mail->send()) 
    {
        $message = "Mailer Error: " . $mail->ErrorInfo;
        return("<script type='text/javascript'>alert('$message');</script>");
    } 
    else 
    {
        $message = "Message has been sent successfully";
        return("<script type='text/javascript'>alert('$message');</script>");
    }
}
?>