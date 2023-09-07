<?php
session_start();

$idUser = $_SESSION['USER']['idUsers'];

if ($_SESSION['USER']['role'] != 'USER') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM users WHERE idUsers = $idUser ";

        $query = $pdo->query($sql);

        $user = $query->fetch();

    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    $title = 'Mon Compte';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';

?>

    <h2>Bonjour, <?=$_SESSION['USER']['surname']?></h2>

    < class="d-flex m-5">
        <div class="sidebar d-flex flex-column w-25 bg-secondary m-5 rounded-4">

            <a href=""><button type="button" class="btn btn-primary btn-lg m-3">LISTE DES MEMBRES</button></a>
            <a href="./create_users.php"><button type="button" class="btn btn-primary btn-lg m-3">AJOUTER UN MEMBRE</button></a>
            <a href=""><button type="button" class="btn btn-primary btn-lg m-3">PUBLICATIONS</button></a>
            <a href=""><button type="button" class="btn btn-primary btn-lg m-3">PARTENAIRES</button></a>
            <a href=""><button type="button" class="btn btn-primary btn-lg m-3">EVENEMENTS</button></a>
            <a href="../SRC/deconnexion.php"><button type="button" class="btn btn-primary btn-lg m-3">DECONNEXION</button></a>

        </div>



<?php

    require_once '../INCLUDES/footer.php';
}
?>