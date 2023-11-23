<?php

try{
require_once "../../SRC/security.php";

$titre = protect($_POST['titre']);
$description = protect($_POST['description']);
$id = $_GET['id'];

require_once "../../SRC/connect_BDD.php";

$pdo = new PDO($attr, $user, $pass, $opts);

$sql = "INSERT INTO publications (titre, description, idUsers) VALUES (:titre, :description,  $id)";

$query = $pdo->prepare($sql);

$query->bindValue(':titre', $titre, PDO::PARAM_STR);
$query->bindValue(':description', $description, PDO::PARAM_STR);

$query->execute();

$last_id = $pdo->lastInsertId();


foreach ($_FILES as $file) {

    $count = count($file["name"]);
    for($i = 0; $i < $count; $i++){

   
    $allowed = [
        "jpg" => "image/jpeg",
        "jpeg" => "image/jpeg",
        "png" => "image/png",
        "pdf" => "application/pdf"
    ];

    if($file['error'][$i] == 0) {
    
    $filename = $file["name"][$i];
    $filetype = $file["type"][$i];
    $filesize = $file["size"][$i];
    

    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    
    if (!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed)) {
        die("Erreur: format de fichier incorrect");
    }

    // if ($filesize > 1024 * 1024) {
    //     die("fichier trop volumineux");
    // }

    $newname = md5(uniqid());

    $newfilename = __DIR__ . "/../../UPLOAD/$newname.$extension";

    if (!move_uploaded_file($file["tmp_name"][$i], $newfilename)) {
        die("telechargement echoué");
    }
     
    chmod($newfilename, 0644);

    $newfilename = "../UPLOAD/$newname.$extension";

    $sql = "INSERT INTO documents (liens, fk_id) VALUES (:liens, $last_id)";
    
    $query = $pdo->prepare($sql);
    
    $query->bindValue(":liens", $newfilename, PDO::PARAM_STR);
    
    $query->execute();
    }
    }
    }


header('location:../dashboardUsers.php');

}catch (PDOException $e) {
throw new PDOException($e->getMessage());
}
