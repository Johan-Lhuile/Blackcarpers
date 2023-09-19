<?php
try{
require_once "../../SRC/security.php";

$nameP = protect($_POST['nameP']);
$emailP = protect(filter_var($_POST['emailP'], FILTER_VALIDATE_EMAIL));
$phoneP = protect($_POST['phoneP']);
$lienF = protect($_POST['lienF']);
$lien = protect($_POST['lien']);
$dateCreation = protect($_POST['dateCreation']);
$adresse = protect($_POST['adresse']);
$responsable = protect($_POST['responsable']);
$nbTeam = protect($_POST['nbTeam']);
$message = protect($_POST['message']);


require_once "../../SRC/connect_BDD.php";

$pdo = new PDO($attr, $user, $pass, $opts);


$sql = "INSERT INTO partenaires (nameP, emailP, phoneP, lienF, lien, dateCreation, adresse, responsable, nbTeam, message) VALUES (:nameP, :emailP, :phoneP, :lienF, :lien, :dateCreation, :adresse, :responsable, :nbTeam, :message)";

    $query = $pdo->prepare($sql);

    $query->bindValue(':nameP', $nameP, PDO::PARAM_STR);
    $query->bindValue(':emailP', $emailP, PDO::PARAM_STR);
    $query->bindValue(":phoneP", $phoneP, PDO::PARAM_STR);
    $query->bindValue(":lienF",$lienF, PDO::PARAM_STR);
    $query->bindValue(":lien",$lien, PDO::PARAM_STR);
    $query->bindValue(":dateCreation",$dateCreation, PDO::PARAM_STR);
    $query->bindValue(":adresse",$adresse, PDO::PARAM_STR);
    $query->bindValue(":responsable",$responsable, PDO::PARAM_STR);
    $query->bindValue(":nbTeam",$nbTeam, PDO::PARAM_STR);
    $query->bindValue(":message",$message, PDO::PARAM_STR);
   

    $query->execute();

    

    header('location:../dashboard.php');

}catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}