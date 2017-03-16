<?php

include "header.php";

require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'help.justtravel@gmail.com';
$mail->Password = 'justtravel123';
$mail->setFrom('help.justtravel@gmail.com');
$mail->addAddress('help.justtravel@gmail.com');
$mail->addCC($_POST['email'], $_POST['name']);
$mail->Subject = $_POST['name'] . ': ' . $_POST['subject'];
$mail->Body =("Thank you for your feedback. Please give us time to review your email."
        ."\n\n\n______________________________________________________"
        . "\n\nSent by:" . $_POST['name']. "\nCreate Date:". date('Y-m-d H:i:s').
        "\n\n" . $_POST['comment']);
//send the message, check for errors
if (!$mail->send()) {
    echo "Email could not be sent - please check your email address and try again";
} else {
    echo "Email was Sent!! Please check your inbox for confirmation";
}
 include "footer.php";
