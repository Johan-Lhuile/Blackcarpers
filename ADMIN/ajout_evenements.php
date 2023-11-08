<?php
session_start();

$idUser = $_SESSION['USER']['idUsers'];

if ($_SESSION['USER']['role'] != 'ADMIN') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    $title = 'Ajouter un Evenement';
    
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';
?>

    <div  class="m-auto max-w-7xl flex justify-around items-center">

        <?php
        require_once '../INCLUDES/sidebar_admin.php';
        ?>


    

    <div  class=" bg-gradient-to-t from-[#36FF24]/50 to-black/60 rounded-lg flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <form action="./CRUD/traitement_newEvenement.php" method="POST" enctype="multipart/form-data">

        <legend class="block text-xl font-medium py-8 text-white">Ajouter un evenements</legend>

        <label for="titre" class="block text-lg pb-4 font-medium leading-6 text-white">Titre:</label>
        <input type="text" name="titre"> 


        <label for="image" class="block text-lg pb-4 font-medium leading-6 text-white">Ajouter les documents:</label>
        <input type="file" class="px-8 py-12 border-2 border-dashed rounded-md dark:border-gray-300 dark:text-gray-300 dark:bg-gray-300" name="image[]" multiple>


        <button type="submit" class="btn-menu">Valider</button>
        
        </form>
    </div>

</div>

    <?php

    require_once '../INCLUDES/footer.php';
}
    ?>