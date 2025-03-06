<?php include '../includes/db_connect.php'; ?>
<?php include '../includes/functions.php'; ?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<main class="container mx-auto p-8">
<div class="max-w-4xl mx-auto bg-gradient-to-br from-blue-100 to-purple-100 rounded-3xl shadow-2xl overflow-hidden">
<?php $animal = getAnimalById($conn, $_GET['id']); ?>

<div class="p-10">
<h2 class="text-4xl font-extrabold text-indigo-800 mb-8 tracking-tight"><?php echo $animal['name']; ?></h2>

<div class="mb-8 rounded-2xl overflow-hidden shadow-lg">
<?php
$parts = explode("/", $animal['image_path']);
$full_image_path = $parts[2] . "/" . $parts[3];
?>
<img src="<?php echo $full_image_path; ?>" alt="<?php echo $animal['name']; ?>" class="w-full h-96 object-cover">
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
<div>
<p class="text-lg text-gray-800 mb-3"><strong class="text-indigo-700">Animal ID:</strong> <?php echo $animal['animal_id']; ?></p>
<p class="text-lg text-gray-800 mb-3"><strong class="text-indigo-700">Species:</strong> <?php echo $animal['animal_type']; ?></p>
<p class="text-lg text-gray-800 mb-3"><strong class="text-indigo-700">Breed:</strong> <?php echo $animal['breed']; ?></p>
<p class="text-lg text-gray-800 mb-3"><strong class="text-indigo-700">Age:</strong> <?php echo $animal['age']; ?></p>
<p class="text-lg text-gray-800 mb-3"><strong class="text-indigo-700">Color:</strong> <?php echo $animal['color']; ?></p>
</div>
<div>
<p class="text-lg text-gray-800 mb-3"><strong class="text-indigo-700">Status:</strong> <span class="text-[#ffaa00] font-semibold"><?php echo $animal['adoption_status']; ?></span></p>
<p class="text-lg text-gray-800 mb-3"><strong class="text-indigo-700">Intake Date:</strong> <?php echo $animal['in_date']; ?></p>
<p class="text-lg text-gray-800 mb-6"><strong class="text-indigo-700">Animal Size:</strong> <?php echo $animal['animal_size']; ?></p>
<a href="adopt.php?id=<?php echo $animal['animal_id']; ?>" class="w-full inline-block bg-gradient-to-r from-green-500 to-blue-600 hover:from-green-600 hover:to-blue-700 text-white font-extrabold py-4 rounded-full transition duration-300 text-center">Adopt Me!</a>
</div>
</div>
</div>
</div>
</main>

<?php include '../includes/footer.php'; ?>
