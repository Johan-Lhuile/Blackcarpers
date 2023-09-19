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
        require_once '../INCLUDES/sidebar_user.php'
        ?>


    </div>

    <div>
        <form action="traitement_create_publication.php" method="POST" enctype="">

        <legend>Ajouter une publication</legend>

        <label for="titre">Titre:</label>
        <input type="text" name="titre">

        <label for="description">Description:</label>
        <input type="text" name="description">

        <label for="image">Ajouter des photos:</label>
        <input type="file" name="image" multiple>

        <button type="submit">Valider</button>
        <p>Ta publication sera en ligne d'ici 24h, le temps qu'elle soit vérifiée par nos Administrateurs</p>
        </form>
    </div>



    <?php

    require_once '../INCLUDES/footer.php';
}
    ?>