<?php

// Get form values safely
$firstn  = $_POST['firstn'] ?? '';
$email   = $_POST['email'] ?? '';
$phone   = $_POST['phone'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// Email validation (basic protection)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

// Build email content
$formcontent = "
New Contact Form Submission - Diagrid Website

First Name: $firstn
Email: $email
Phone: $phone
Subject: $subject

Message:
$message
";

// Recipient
$recipient = "info@diagridgroup.co.ke";

// Email subject
$email_subject = "New Website Contact - $subject";

// IMPORTANT: Use your domain email as sender
$headers = "From: info@diagridgroup.co.ke\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send email
if (mail($recipient, $email_subject, $formcontent, $headers)) {
    header("Location: thank-you.html");
    exit();
} else {
    echo "Error sending message.";
}

?>