<?php
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = str_replace("\n.", "\n..", $message);
$message = wordwrap(strip_tags(htmlspecialchars($_POST['message']), 70, "\r\n"););


// Create the email and send the message
$to = "julie.vignaux.pro@gmail.com"; // Add your email address in between the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Website Contact Form:  $name";
$body = "Vous avez reçu un message du site julie.vignaux.github.io.\n\n"."Voici les informations:\n\nNom: $name\n\nEmail: $email\n\nTéléphone: $phone\n\nMessage:\n$message";
$header = "From: noreply@julievignaux.com\n"; // .
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
