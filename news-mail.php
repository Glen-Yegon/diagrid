<?php
$email = $_POST['email'];

$formcontent = "Newsletter Subscription Email: $email";

$recipient = "info@diagridgroup.co.ke";
$subject = "New Newsletter Subscription - Diagrid";

$headers = "From: info@diagridgroup.co.ke\r\n";
$headers .= "Reply-To: $email\r\n";

mail($recipient, $subject, $formcontent, $headers) or die("Error!");

require_once "thank-you.html";
?>