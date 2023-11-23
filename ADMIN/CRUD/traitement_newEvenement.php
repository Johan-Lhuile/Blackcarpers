
<?php

try {

    require_once "../../SRC/security.php";

    $titre = protect($_POST['titre']);

    require_once "../../SRC/connect_BDD.php";

    $pdo = new PDO($attr, $user, $pass, $opts);
         
        $allowed = [
            "jpg" => "image/jpeg",
            "jpeg" => "image/jpeg",
            "png" => "image/png",
            "pdf" => "application/pdf"
        ];

        if($_FILES['affiche']['error'] == 0) {
        
        $filenameAffiche = $_FILES['affiche']["name"];
        $filetypeAffiche = $_FILES['affiche']["type"];
        $filesizeAffiche = $_FILES['affiche']["size"];
        
        $filenameDoc = $_FILES['docPdf']["name"];
        $filetypeDoc = $_FILES['docPdf']["type"];
        $filesizeDoc = $_FILES['docPdf']["size"];

        $extension = pathinfo($filenameAffiche, PATHINFO_EXTENSION);
        
        if (!array_key_exists($extension, $allowed) || !in_array($filetypeAffiche, $allowed)) {
            die("Erreur: format de fichier incorrect");
        }

        // if ($filesize > 1024 * 1024) {
        //     die("fichier trop volumineux");
        // }

        $newnameAffiche = uniqid('affiche_');

        $newfilenameAffiche = __DIR__ . "/../../UPLOAD/$newnameAffiche.$extension";

        if (!move_uploaded_file($_FILES['affiche']["tmp_name"], $newfilenameAffiche)) {
            die("telechargement echoué");
        }
         
        chmod($newfilenameAffiche, 0644);

        $newfilenameAffiche = "../UPLOAD/$newnameAffiche.$extension";

        $sql = "INSERT INTO evenements (titre, affiche) VALUES (:titre, :affiche)";
        
        $query = $pdo->prepare($sql);

        $query->bindValue(':titre', $titre, PDO::PARAM_STR);
        // $query->bindValue(":description", $description, PDO::PARAM_STR);
        $query->bindValue(":affiche", $newfilenameAffiche, PDO::PARAM_STR);
        // $query->bindValue(":doc_pdf", $newfilenameDoc, PDO::PARAM_STR);
        
        $query->execute();
        }
        

    header('location:../dashboard.php');
   
} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
}
