<?php

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


  $api_key_value = "abdulrahman28";

  $api_key = $name = $email = $subject = $message = $receiver = $description = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $api_key = test_input($_POST["api"]);
    if($api_key == $api_key_value) {
      $name = test_input($_POST["name"]);
      $email = test_input($_POST["email"]);
      $subject = test_input($_POST["subject"]);
      $message = test_input($_POST["message"]);
      $receiver = test_input($_POST["receiver"]);
      $description = test_input($_POST["description"]);

      $message = "<h3>" . $description . " " . $name . ", Email: " . $email . "</h3><h3>Message: </h3>" . $message;

      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth = "true";
      $mail->SMTPSecure = "tls";
      $mail->Port = "587";
      $mail->Username = "mailmessengernoreply@gmail.com";
      $mail->Password = "fkitmkjwscexzrxq";
      $mail->Subject = $subject;
      $mail->setFrom("mailmessengernoreply@gmail.com");
      $mail->isHTML(true);
      $mail->Body = $message;
      $mail->addAddress($receiver);
      if($mail->Send()) echo "OK";
      else "Error";

      $mail->smtpClose();


    }

    else echo "Wrong API Key provided.";
    
  }

  else echo "No data posted with HTTP POST.";
  

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>