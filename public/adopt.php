<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<main class="container mx-auto p-8">
<section class="max-w-2xl mx-auto bg-gradient-to-r from-yellow-100 to-green-100 rounded-lg shadow-lg p-8">
<h2 class="text-4xl font-extrabold text-green-700 mb-6">Adoption Application</h2>
<p class="text-lg text-gray-800 mb-6">Ready to give a loving animal a forever home? Please fill out the form below:</p>

<form method="POST" action="process_adoption.php" class="space-y-6">
<div>
<label for="name" class="block text-sm font-semibold text-green-600 mb-2">Your Full Name:</label>
<input type="text" name="name" id="name" class="w-full px-4 py-3 border border-green-300 rounded-md shadow-sm focus:ring focus:ring-green-200 focus:outline-none text-gray-800" required>
</div>
<div>
<label for="email" class="block text-sm font-semibold text-green-600 mb-2">Email Address:</label>
<input type="email" name="email" id="email" class="w-full px-4 py-3 border border-green-300 rounded-md shadow-sm focus:ring focus:ring-green-200 focus:outline-none text-gray-800" required>
</div>
<div>
<label for="phone" class="block text-sm font-semibold text-green-600 mb-2">Phone Number:</label>
<input type="tel" name="phone" id="phone" class="w-full px-4 py-3 border border-green-300 rounded-md shadow-sm focus:ring focus:ring-green-200 focus:outline-none text-gray-800" required>
</div>
<div>
<label for="address" class="block text-sm font-semibold text-green-600 mb-2">Your Address:</label>
<textarea name="address" id="address" rows="4" class="w-full px-4 py-3 border border-green-300 rounded-md shadow-sm focus:ring focus:ring-green-200 focus:outline-none text-gray-800" required></textarea>
</div>
<div>
<label for="animal_id" class="block text-sm font-semibold text-green-600 mb-2">Animal ID:</label>
<input type="text" name="animal_id" id="animal_id" value="<?php echo $_GET['id']; ?>" class="w-full px-4 py-3 border border-green-300 rounded-md shadow-sm focus:ring focus:ring-green-200 focus:outline-none text-gray-800" required>
</div>
<div>
<button type="submit" class="w-full bg-gradient-to-r from-green-500 to-yellow-600 hover:from-green-600 hover:to-yellow-700 text-white font-extrabold py-4 rounded-md transition duration-300">Submit Application</button>
</div>
</form>
</section>
</main>

<?php include '../includes/footer.php'; ?>
