<?php

try {
    require_once "../../SRC/security.php";

    $titre = protect($_POST['titre']);
    $files = protect($_POST['images']);
    
    require_once "../../SRC/connect_BDD.php";

    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = "INSERT INTO evenements (titre, lienImages) VALUES (:titre, :lienImages)";

    $query = $pdo->prepare($sql);

    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->bindValue(":lienImages", $files, PDO::PARAM_STR);


    $query->execute();


    header('location:../dashboard.php');
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
