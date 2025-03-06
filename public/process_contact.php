<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];

	// basic email validation
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// basic email sending
		$to = "your-email@example.com"; // Replace with your email address
		$subject = "Contact Form Submission";
		$body = "Name: " . $name . "\nEmail: " . $email . "\nMessage: " . $message;
		$headers = "From: " . $email;

		if (mail($to, $subject, $body, $headers)) {
			echo "Message sent successfully!";
		} else {
			echo "Failed to send message.";
		}
	} else {
		echo "Invalid email address.";
	}
}
?>
