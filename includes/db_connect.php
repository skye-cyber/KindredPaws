<?php
$servername = "your_servername"; // e.g., localhost
$username = "your_username";
$password = "your_password";
$dbname = "animal_shelter";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Connected successfully"; // Uncomment for debugging
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
?>
