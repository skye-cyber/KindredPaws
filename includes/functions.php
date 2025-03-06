<?php
function getAnimals($conn) {
	$stmt = $conn->prepare("SELECT * FROM Animals");
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAnimalById($conn, $animalId) {
	$stmt = $conn->prepare("SELECT * FROM Animals WHERE animal_id = :animal_id");
	$stmt->bindParam(':animal_id', $animalId);
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Add more functions as needed
?>
