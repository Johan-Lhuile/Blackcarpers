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

    <h2>Bonjour, <?= $_SESSION['USER']['surname'] ?></h2>

    <div class="d-flex m-5">

        <?php
        require_once '../INCLUDES/sidebar_user.php'
        ?>


    </div>



    <?php

    require_once '../INCLUDES/footer.php';
}
    ?>