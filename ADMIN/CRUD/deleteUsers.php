<?php
session_start();

$idUser = $_GET['id'];
if ($_SESSION['USER']['role'] != 'ADMIN') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../../PUBLIC/index.php');
    exit;
} else {
    try {
        require_once "../../SRC/connect_BDD.php";

        $pdo = new PDO($attr, $user, $pass, $opts);

        $query = $pdo->prepare("DELETE FROM users WHERE idUsers = :idUser");

        $query->bindValue(':idUser', $idUser, PDO::PARAM_STR);

        $result = $query->execute();

        header('location:../dashboard.php');
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
}
