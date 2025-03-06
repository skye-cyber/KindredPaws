<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>


<main class="container mx-auto p-10">
<section class="max-w-3xl mx-auto bg-gradient-to-br from-green-100 to-teal-100 rounded-3xl shadow-2xl p-12 text-center">
<h2 class="text-4xl font-extrabold text-green-700 mb-8 tracking-tight">Adoption Successful!</h2>
<p class="text-xl text-gray-800 mb-6">Congratulations! You have successfully adopted an animal from KindredPaws.</p>

<div class="space-y-6">
<p class="text-lg"><strong>Animal ID:</strong> <?php echo $_GET['animal_id']; ?></p>
<p class="text-lg"><strong>Adopter Name:</strong> <?php echo $_GET['name']; ?></p>
<p class="text-lg"><strong>Adopter Email:</strong> <?php echo $_GET['email']; ?></p>
<p class="text-lg"><strong>Adopter Phone:</strong> <?php echo $_GET['phone']; ?></p>
<p class="text-lg"><strong>Adopter Address:</strong> <?php echo $_GET['address']; ?></p>
<p class="text-lg"><strong>Adoption Date:</strong> <?php echo date("Y-m-d"); ?></p>
</div>

<a href="index.php" class="inline-block bg-gradient-to-r from-teal-500 to-green-600 hover:from-teal-600 hover:to-green-700 text-white font-extrabold py-3 px-8 rounded-full mt-8 transition duration-300">Return to Home</a>
</section>
</main>

<?php include '../includes/footer.php'; ?>
