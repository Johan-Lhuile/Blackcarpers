<?php
try{
require_once "../../SRC/security.php";

$titre = protect($_POST['titre']);
$description = protect($_POST['description']);
$image = protect($_POST['image']);

require_once "../../SRC/connect_BDD.php";

$pdo = new PDO($attr, $user, $pass, $opts);


$sql = "INSERT INTO description (titre, description, image) VALUES (:titre, :description, :image)";

    $query = $pdo->prepare($sql);

    $query->bindValue(':titre', $titre, PDO::PARAM_STR);
    $query->bindValue(':description', $description, PDO::PARAM_STR);
    $query->bindValue(':image', $image, PDO::PARAM_STR);

    $query->execute();


    header('location:../dashboard.php');

}catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}