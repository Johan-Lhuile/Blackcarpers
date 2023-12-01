<?php
session_start();
if ($_SESSION['USER']['role'] != 'USER') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../PUBLIC/index.php');
    exit;
} else {
    $idDoc = $_GET['id'];

    try {
        require_once "../../SRC/connect_BDD.php";

        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT liens FROM documents WHERE idDocuments = $idDoc";

        $query = $pdo->query($sql);

        $lien = $query->fetch();

        $fichier = '../' . $lien['liens'];

        unlink($fichier);



        $query = $pdo->prepare("DELETE FROM documents WHERE idDocuments = :idDoc");

        $query->bindValue(':idDoc', $idDoc, PDO::PARAM_STR);

        $result = $query->execute();

        header('location:../publications.php');
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
}
