<?php include '../includes/db_connect.php'; ?>
<?php include '../includes/functions.php'; ?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<main class="container mx-auto p-8">
<section class="mb-12 text-center">
<h2 class="text-5xl font-extrabold text-indigo-700 mb-8 tracking-tight">Welcome to Our Furry Friends' Haven</h2>
<p class="text-xl text-gray-800 leading-relaxed max-w-2xl mx-auto">Discover your new best friend! We're dedicated to finding loving homes for animals in need. Let's make a difference together.</p>
</section>

<section>
<h3 class="text-3xl font-semibold text-indigo-600 mb-6 text-center">Meet Our Featured Pets</h3>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
<?php
$animals = getAnimals($conn);
foreach ($animals as $animal) {
	if ($animal['adoption_status'] == "Available") {
		?>
		<div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-transform transform hover:scale-105">
		<div class="p-6">
		<?php
		$parts = explode("/", $animal['image_path']);
		$full_image_path = $parts[2] . "/" . $parts[3];
		?>
		<img src="<?php echo $full_image_path; ?>" alt="<?php echo $animal['name']; ?>" class="w-full h-72 object-cover rounded-xl mb-6">
		<h4 class="text-2xl font-bold text-indigo-800 mb-3"><?php echo $animal['name']; ?></h4>
		<p class="text-lg text-gray-700 mb-2"><strong>Breed:</strong> <?php echo $animal['breed']; ?></p>
		<p class="text-lg text-gray-700 mb-4"><strong>Age:</strong> <?php echo $animal['age']; ?></p>
		<a href="animal_details.php?id=<?php echo $animal['animal_id']; ?>" class="inline-block bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white font-semibold py-3 px-6 rounded-full transition duration-300">View Details</a>
		</div>
		</div>
		<?php
	}
}
?>
</div>
</section>
</main>

<?php include '../includes/footer.php'; ?>
