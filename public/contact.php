<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<main class="container mx-auto p-4">
<h2 class="text-xl font-semibold mb-4">Contact Us</h2>
<p>Please fill out the form below to contact us:</p>

<form method="POST" action="process_contact.php" class="max-w-md">
<div class="mb-4">
<label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
<input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
</div>
<div class="mb-4">
<label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
<input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
</div>
<div class="mb-4">
<label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message:</label>
<textarea name="message" id="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
</div>
<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
</form>
</main>

<?php include '../includes/footer.php'; ?>
