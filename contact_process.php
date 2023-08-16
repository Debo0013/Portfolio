<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "debodas1333@gmail.com";  // Replace with your email address
    $from = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    $subject = "New Contact Form Submission from $name";

    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$body = "<html><body>";
    $body .= "<h2>Contact Form Submission</h2>";
    $body .= "<p><strong>Name:</strong> $name</p>";
    $body .= "<p><strong>Email:</strong> $from</p>";
    $body .= "<p><strong>Message:</strong><br>$message</p>";
    $body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);

    if ($send) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Error sending message. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
