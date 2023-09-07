<?php

session_start();

if ($_SESSION['USER']['role'] != 'ADMIN') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    $titre = "Ajout d'un pirate";

    require_once '../INCLUDES/header.php';
    require_once "../INCLUDES/menu.php";
?>

    <form class="my-5 mx-auto" action="./CRUD/createUsers.php" method="POST">
        <fieldset>
            <legend>J'ajoute un membre:</legend>
            <div class="form-group">
                <label for="name" class="form-label mt-4">Son nom</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="surname" class="form-label mt-4">Son prénom</label>
                <input type="text" name="surname" class="form-control" id="surname" placeholder="Prénom">
            </div>
            <div class="form-group">
                <label for="email" class="form-label mt-4">Votre Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            </div>

            <button type="submit" class="btn btn-primary mt-4">Ajouter</button>
        </fieldset>
    </form>

<?php
    require_once "../INCLUDES/footer.php";
}
?>