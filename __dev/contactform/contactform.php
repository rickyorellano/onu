<?php
/*
  PHP contact form script
*/

/***************** Configuration *****************/

  $contact_email_from = "no-reply@c1580757.ferozo.com";     // Mail origen
  $contact_email_to = "info@onuestudio.com.ar";             // Mail destino

  // Title prefixes
  $subject_title = "Contacto desde el sitio web:";
  $name_title = "Nombre:";
  $email_title = "e-mail:";
  $message_title = "Mensaje: <br><br>";

  // Error messages
  $contact_error_name = "El nombre es muy corto o está vacío!";
  $contact_error_email = "Por favor ingrese un e-mail válido!";
  $contact_error_subject = "El asunto es muy corto o está vacío!";
  $contact_error_message = "El mensaje es muy corto. Por favor esciriba algún mensaje.";

/********** Do not edit from the below line ***********/

  if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    die('Sorry Request must be Ajax POST');
  }

  if(isset($_POST)) {

    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    if(!$contact_email_to || $contact_email_to == 'contact@example.com') {
      die('The contact form receiving email address is not configured!');
    }

    if(strlen($name)<3){
      die($contact_error_name);
    }

    if(!$email){
      die($contact_error_email);
    }

    if(strlen($subject)<3){
      die($contact_error_subject);
    }

    if(strlen($message)<3){
      die($contact_error_message);
    }

    $headers = 'From: ' . $name . ' <' . $contact_email_from . '>' . PHP_EOL;
    $headers .= 'Reply-To: ' . $email . PHP_EOL;
    $headers .= 'MIME-Version: 1.0' . PHP_EOL;
    $headers .= 'Content-Type: text/html; charset=UTF-8' . PHP_EOL;
    $headers .= 'X-Mailer: PHP/' . phpversion();

    $message_content = '<strong>' . $name_title . '</strong> ' . $name . '<br>';
    $message_content .= '<strong>' . $email_title . '</strong> ' . $email . '<br>';
    $message_content .= '<strong>' . $message_title . '</strong> ' . nl2br($message);

    $sendemail = mail($contact_email_to, $subject_title . ' ' . $subject, $message_content, $headers);

    if( $sendemail ) {
      echo 'OK';
    } else {
      echo 'El mensaje no se pudo enviar! Please check your PHP mail configuration.';
    }
  }
?>
