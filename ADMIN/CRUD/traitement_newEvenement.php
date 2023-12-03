<?php
session_start();
if ($_SESSION['USER']['role'] != 'ADMIN') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../../PUBLIC/index.php');
    exit;
} else {

    try {

        require_once "../../SRC/security.php";

        $titre = protect($_POST['titre']);
        $description = protect($_POST['description']);
        $start = $_POST['start'];
        $end = $_POST['end'];




        require_once "../../SRC/connect_BDD.php";

        $pdo = new PDO($attr, $user, $pass, $opts);

        $allowed = [
            "jpg" => "image/jpeg",
            "jpeg" => "image/jpeg",
            "png" => "image/png",
            "pdf" => "application/pdf"
        ];

        if ($_FILES['affiche']['error'] == 0 && $_FILES['docPdf']['error'] == 0) {

            $filenameAffiche = $_FILES['affiche']["name"];
            $filetypeAffiche = $_FILES['affiche']["type"];
            $filesizeAffiche = $_FILES['affiche']["size"];

            $filenameDoc = $_FILES['docPdf']["name"];
            $filetypeDoc = $_FILES['docPdf']["type"];
            $filesizeDoc = $_FILES['docPdf']["size"];

            $extensionAffiche = pathinfo($filenameAffiche, PATHINFO_EXTENSION);
            $extensionDoc = pathinfo($filenameDoc, PATHINFO_EXTENSION);

            if (!array_key_exists($extensionAffiche, $allowed) || !in_array($filetypeAffiche, $allowed)) {
                die("Erreur: format de fichier incorrect");
            }
            if (!array_key_exists($extensionDoc, $allowed) || !in_array($filetypeDoc, $allowed)) {
                die("Erreur: format de fichier incorrect");
            }

            // if ($filesize > 1024 * 1024) {
            //     die("fichier trop volumineux");
            // }

            $newnameAffiche = uniqid('affiche_');
            $newnameDoc = uniqid('Doc_');

            $newfilenameAffiche = __DIR__ . "/../../UPLOAD/$newnameAffiche.$extensionAffiche";
            $newfilenameDoc = __DIR__ . "/../../UPLOAD/$newnameDoc.$extensionDoc";

            if (!move_uploaded_file($_FILES['affiche']["tmp_name"], $newfilenameAffiche)) {
                die("telechargement echoué");
            }
            if (!move_uploaded_file($_FILES['docPdf']["tmp_name"], $newfilenameDoc)) {
                die("telechargement echoué");
            }

            chmod($newfilenameAffiche, 0644);
            chmod($newfilenameDoc, 0644);

            $newfilenameAffiche = "../UPLOAD/$newnameAffiche.$extensionAffiche";
            $newfilenameDoc = "../UPLOAD/$newnameDoc.$extensionDoc";

            $sql = "INSERT INTO evenements (titre, description, affiche, doc_pdf, start, end) VALUES (:titre, :description, :affiche, :doc_pdf, :start, :end)";

            $query = $pdo->prepare($sql);

            $query->bindValue(':titre', $titre, PDO::PARAM_STR);
            $query->bindValue(":description", $description, PDO::PARAM_STR);
            $query->bindValue(":affiche", $newfilenameAffiche, PDO::PARAM_STR);
            $query->bindValue(":doc_pdf", $newfilenameDoc, PDO::PARAM_STR);
            $query->bindValue(":start", $start, PDO::PARAM_STR);
            $query->bindValue(":end", $end, PDO::PARAM_STR);

            $query->execute();
        }


        header('location:../dashboard.php');
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
}
