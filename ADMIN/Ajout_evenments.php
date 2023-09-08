<?php
session_start();

$idUser = $_SESSION['USER']['idUsers'];

if ($_SESSION['USER']['role'] != 'USER') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    $title = 'Ajouter un Post';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';

?>

    <div class="d-flex m-5">

        <?php
        require_once '../INCLUDES/sidebar_admin.php'
        ?>


    </div>

    <div>
        <form action="traitement_newEvenement.php" method="POST" enctype="">

        <legend>Ajouter un evenements</legend>

        <label for="titre">Titre:</label>
        <input type="text" name="titre">


        <label for="image">Ajouter les documents:</label>
        <input type="file" name="image" multiple>

        <button type="submit">Valider</button>
        
        </form>
    </div>



    <?php

    require_once '../INCLUDES/footer.php';
}
    ?>