<?php
$servername = "localhost"; // e.g., localhost
$username = "phpmyadmin";
$password = "KindredPaws_PASS";
$dbname = "KindredPaws";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Connected successfully"; // Uncomment for debugging
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
?>
