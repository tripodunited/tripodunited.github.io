<?php

  $api_key_value = "abdulrahman28";

  $api_key = $name = $email = $subject = $message = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $api_key = test_input($_POST["api"]);
    if($api_key == $api_key_value) {
      $name = test_input($_POST["name"]);
      $email = test_input($_POST["email"]);
      $subject = test_input($_POST["subject"]);
      $message = test_input($_POST["message"]);
      /*

      echo "Name: " . $name . ", ";
      echo "Email: " . $email . ", ";
      echo "Subject: " . $subject . ", ";
      echo "Message: " . $message . ". ";
      */


      echo "OK";

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