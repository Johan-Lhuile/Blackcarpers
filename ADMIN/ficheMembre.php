<?php
session_start();

if ($_SESSION['USER']['role'] != 'ADMIN') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {
    $idUser = $_GET['id'];

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM USERS WHERE idUsers = $idUser";

        $query = $pdo->query($sql);

        $user = $query->fetch();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    $title = 'Mes Pirates';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';

?>

    <div class="d-flex ">

        <div class="sidebar d-flex flex-column w-25 bg-secondary m-5 rounded-4">

            <a href=""><button type="button" class="btn btn-primary btn-lg m-3 ">LISTE DES MEMBRES</button></a>
            <a href=""><button type="button" class="btn btn-primary btn-lg m-3">AJOUTER UN MEMBRE</button></a>
            <a href=""><button type="button" class="btn btn-primary btn-lg m-3">PUBLICATIONS</button></a>
            <a href=""><button type="button" class="btn btn-primary btn-lg m-3">PARTENAIRES</button></a>
            <a href=""><button type="button" class="btn btn-primary btn-lg m-3">EVENEMENTS</button></a>
            <a href=""><button type="button" class="btn btn-primary btn-lg m-3">DECONNEXION</button></a>

        </div>

        <div class="info d-flex flex-column w-25 bg-secondary m-5 rounded-4">

            <h5 class="m-3">Nom: <?= $user["name"] ?></h5>
            <h5 class="m-3">Prénom: <?= $user["surname"] ?></h5>
            <h5 class="m-3">Email: <?= $user["email"] ?></h5>
            <h5 class="m-3">Téléphone: <?= $user["phone"] ?></h5>
            <h5 class="m-3">POINTS: <?= $user["points"] ?></h5>
        </div>
        <form class="m-auto" action="./CRUD/update_point.php?id=<?= $idUser ?>" method="post">
            <legend class="mt-4">Points de participation:</legend>

            <input class="mb-5" type="number" name="points" min="0" max="100">
            <button class="btn btn-primary" type="submit">Valider</button>
        </form>
        <form class="m-auto" action="./CRUD/update_role.php?id=<?= $idUser ?>" method="post">
                <legend class="mt-4">Role:</legend>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="role" value="USER">
                    <label class="form-check-label" for="optionsRadios1">
                        Utilisateur
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="role" value="ADMIN">
                    <label class="form-check-label" for="optionsRadios2">
                        Administrateur
                    </label>
                </div>
                <button class="btn btn-primary" type="submit">Valider</button>
        
        <legend class="mt-4">Supprimer ce compte:</legend>
        <a class="m-auto" href="./CRUD/deleteUsers.php?id=<?= $user["idUsers"] ?>"><button class="btn btn-danger">Supprimer</button></a>
        </form>

    </div>
<?php

    require_once '../INCLUDES/footer.php';
}
?>