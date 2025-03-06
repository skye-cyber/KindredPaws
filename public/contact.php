<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<main class="container mx-auto p-8">
<section class="max-w-2xl mx-auto bg-gradient-to-r from-purple-100 to-pink-100 rounded-lg shadow-lg p-8">
<h2 class="text-4xl font-extrabold text-indigo-700 mb-6">Contact Us!</h2>
<p class="text-lg text-gray-800 mb-6">Let's connect! Please fill out the form below:</p>

<form method="POST" action="process_contact.php" class="space-y-6">
<div>
<label for="name" class="block text-sm font-semibold text-indigo-600 mb-2">Your Name:</label>
<input type="text" name="name" id="name" class="w-full px-4 py-3 border border-purple-300 rounded-md shadow-sm focus:ring focus:ring-purple-200 focus:outline-none text-gray-800">
</div>
<div>
<label for="email" class="block text-sm font-semibold text-indigo-600 mb-2">Your Email:</label>
<input type="email" name="email" id="email" class="w-full px-4 py-3 border border-purple-300 rounded-md shadow-sm focus:ring focus:ring-purple-200 focus:outline-none text-gray-800">
</div>
<div>
<label for="message" class="block text-sm font-semibold text-indigo-600 mb-2">Your Message:</label>
<textarea name="message" id="message" rows="5" class="w-full px-4 py-3 border border-purple-300 rounded-md shadow-sm focus:ring focus:ring-purple-200 focus:outline-none text-gray-800"></textarea>
</div>
<div>
<button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white font-extrabold py-4 rounded-md transition duration-300">Send Message</button>
</div>
</form>
</section>
</main>

<?php include '../includes/footer.php'; ?>
