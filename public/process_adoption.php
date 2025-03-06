<?php
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $animal_id = $_POST["animal_id"];
    $adoption_date = date("Y-m-d");

    try {
        $stmt = $conn->prepare("INSERT INTO Adopters (name, email, phone, address) VALUES (:name, :email, :phone, :address)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->execute();

        $adopter_id = $conn->lastInsertId();

        $stmt = $conn->prepare("INSERT INTO Adoptions (animal_id, adopter_id, adoption_date) VALUES (:animal_id, :adopter_id, :adoption_date)");
        $stmt->bindParam(':animal_id', $animal_id);
        $stmt->bindParam(':adopter_id', $adopter_id);
        $stmt->bindParam(':adoption_date', $adoption_date);
        $stmt->execute();

        $stmt = $conn->prepare("UPDATE Animals set adoption_status = 'Adopted' where animal_id = :animal_id");
        $stmt->bindParam(':animal_id', $animal_id);
        $stmt->execute();
        echo "Adoption successful!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

/*
 // Example: after uploading an image
 $inputImagePath = "public/images/uploaded_image.jpg"; // Path to the uploaded image
 $outputImagePath = "public/images/watermarked_image.jpg";
 $watermarkText = "Animal Shelter";

 $pythonScriptPath = "../python/image_processing.py"; // Path to your Python script

 $command = "python3 " . escapeshellarg($pythonScriptPath) . " " . escapeshellarg($inputImagePath) . " " . escapeshellarg($outputImagePath) . " " . escapeshellarg($watermarkText);

 exec($command);

 // use $outputImagePath in your HTML to display the watermarked image
 */
?>
