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
        // Redirect to success page with details
        header("Location: adoption_success.php?animal_id=$animal_id&name=$name&email=$email&phone=$phone&address=$address");
        exit();
    } catch (PDOException $e) {
        // Log the error (recommended)
        error_log("PDO Exception: " . $e->getMessage());

        // Optionally, display a user-friendly error message (not the raw exception)
        // echo "An error occurred. Please try again later.";

        // Redirect to failure page
        header("Location: adoption_failure.php");
        exit();
    }
}
?>
