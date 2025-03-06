<?php include '../includes/db_connect.php'; ?>
<?php include '../includes/functions.php'; ?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<main class="container mx-auto p-10">
<section class="mb-12 text-center">
<h2 class="text-5xl font-extrabold text-teal-700 mb-8 tracking-tight">Meet Our Adorable Companions</h2>
<p class="text-xl text-gray-800 leading-relaxed max-w-3xl mx-auto">Find your perfect match! Browse our loving animals waiting for their forever homes.</p>
</section>

<section>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
<?php
$animals = getAnimals($conn);
foreach ($animals as $animal) {
	?>
	<div class="bg-gradient-to-br from-teal-100 to-lime-100 rounded-3xl shadow-2xl overflow-hidden transition-transform transform hover:scale-105">
	<div class="p-8">
	<?php
	$parts = explode("/", $animal['image_path']);
	$full_image_path = $parts[2] . "/" . $parts[3];
	?>
	<img src="<?php echo $full_image_path; ?>" alt="<?php echo $animal['name']; ?>" class="w-full h-80 object-cover rounded-2xl mb-6">
	<h4 class="text-2xl font-bold text-teal-800 mb-3 tracking-tight"><?php echo $animal['name']; ?></h4>
	<p class="text-lg text-gray-700 mb-2"><strong class="text-teal-600">Breed:</strong> <?php echo $animal['breed']; ?></p>
	<p class="text-lg text-gray-700 mb-4"><strong class="text-teal-600">Age:</strong> <?php echo $animal['age']; ?></p>
	<a href="animal_details.php?id=<?php echo $animal['animal_id']; ?>" class="w-full inline-block bg-gradient-to-r from-lime-500 to-teal-600 hover:from-lime-600 hover:to-teal-700 text-white font-extrabold py-3 rounded-full transition duration-300 text-center">Learn More</a>
	</div>
	</div>
	<?php
}
?>
</div>
</section>
</main>

<?php include '../includes/footer.php'; ?>
