<?php include '../includes/db_connect.php'; ?>
<?php include '../includes/functions.php'; ?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<main class="container mx-auto p-4">
    <?php
        $animal = getAnimalById($conn, $_GET['id']);
        echo '<h2 class="text-xl font-semibold mb-4">'.$animal['name'].'</h2>';
        echo '<img src="'.$animal['image_path'].'" alt="'.$animal['name'].'" class="w-full h-96 object-cover mb-2">';
        echo '<p>Species: '.$animal['species'].'</p>';
        echo '<p>Breed: '.$animal['breed'].'</p>';
        echo '<p>Age: '.$animal['age'].'</p>';
        echo '<p>Gender: '.$animal['gender'].'</p>';
        echo '<p>Description: '.$animal['description'].'</p>';
    ?>
</main>

<?php include '../includes/footer.php'; ?>
