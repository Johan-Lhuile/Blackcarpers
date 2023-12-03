<?php
session_start();
if ($_SESSION['USER']['role'] != 'ADMIN') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../../PUBLIC/index.php');
    exit;
} else {

    $idUser = $_GET['id'];
    $role = $_POST['role'];

    try {
        require_once '../../SRC/connect_BDD.php';

        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " UPDATE users SET role = :role WHERE users.idUsers = $idUser";

        $query = $pdo->prepare($sql);

        $query->bindValue(':role', $role, PDO::PARAM_STR);

        $query->execute();

        header('location: ../ficheMembre.php?id=' . $idUser . '');
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
}
