<?php
$to = "user2@gmail.com";
$subject = "Test TCT";
$message = "Hello! From TCT";
$from = "user1@gmail.com";
$headers = "From: $from\r\n" .
            "Reply-To: $from\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}

