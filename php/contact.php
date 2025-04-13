<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['Name']);
    $email   = htmlspecialchars($_POST['Email']);
    $message = htmlspecialchars($_POST['Message']);

    $to      = "";  // <-- change this to your email
    $subject = "New message from contact form";
    $body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
}
?>
