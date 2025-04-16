<?php
// Set your email where you want to receive messages
$to = "99groupofhotels@gmail.com";

// Get form inputs and sanitize
$name = htmlspecialchars(trim($_POST["Name"] ?? ''));
$email = filter_var(trim($_POST["Email"] ?? ''), FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars(trim($_POST["Message"] ?? ''));

// Validate
if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please fill in all fields correctly.";
    exit;
}

// Subject and email content
$subject = "New Message from Contact Form";
$email_message = "Name: $name\n";
$email_message .= "Email: $email\n\n";
$email_message .= "Message:\n$message\n";

// Headers
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";

// Send the email
if (mail($to, $subject, $email_message, $headers)) {
    echo "Thank you for contacting us. We'll get back to you shortly.";
} else {
    echo "Sorry, something went wrong. Please try again later.";
}
?>
