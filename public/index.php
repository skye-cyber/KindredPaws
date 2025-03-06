<?php include '../includes/db_connect.php'; ?>
<?php include '../includes/functions.php'; ?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<main class="container mx-auto p-4">
<h2 class="text-xl font-semibold mb-4">Welcome to Our Shelter</h2>
<p>We are dedicated to finding loving homes for animals in need.</p>

<h3 class="text-lg font-semibold mt-6 mb-2">Featured Animals</h3>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
<?php
$animals = getAnimals($conn);
foreach ($animals as $animal) {
	if ($animal['adoption_status'] == "Available"){
		echo '<div class="border p-4">';
		echo '<img src="' . $animal['image_path'] . '" alt="' . $animal['name'] . '" class="w-full h-48 object-cover mb-2">';
		echo '<h4 class="font-semibold">' . $animal['name'] . '</h4>';
		echo '<p>Breed: ' . $animal['breed'] . '</p>';
		echo '<p>Age: ' . $animal['age'] . '</p>';
		echo '</div>';
	}
}
?>
</div>
</main>

<?php include '../includes/footer.php'; ?>
