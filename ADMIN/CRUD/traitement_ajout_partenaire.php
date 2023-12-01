<?php
session_start();
if ($_SESSION['USER']['role'] != 'ADMIN') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../PUBLIC/index.php');
    exit;
} else {
    try {
        require_once "../../SRC/security.php";

        $allowed = [
            "jpg" => "image/jpeg",
            "jpeg" => "image/jpeg",
            "png" => "image/png",
            "pdf" => "application/pdf"
        ];

        if ($_FILES['logo']['error'] == 0) {

            $filenameLogo = $_FILES['logo']["name"];
            $filetypeLogo = $_FILES['logo']["type"];
            $filesizeLogo = $_FILES['logo']["size"];

            $extension = pathinfo($filenameLogo, PATHINFO_EXTENSION);

            if (!array_key_exists($extension, $allowed) || !in_array($filetypeLogo, $allowed)) {
                die("Erreur: format de fichier incorrect");
            }

            // if ($filesize > 1024 * 1024) {
            //     die("fichier trop volumineux");
            // }

            $newnameLogo = uniqid('logo_');

            $newfilenameLogo = __DIR__ . "/../../UPLOAD/$newnameLogo.$extension";

            if (!move_uploaded_file($_FILES['logo']["tmp_name"], $newfilenameLogo)) {
                die("telechargement echoué");
            }

            chmod($newfilenameLogo, 0644);

            $newfilenameLogo = "../UPLOAD/$newnameLogo.$extension";

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


            $sql = "INSERT INTO partenaires (nameP, emailP, phoneP, lienF, lien, dateCreation, adresse, responsable, nbTeam, message, logo) VALUES (:nameP, :emailP, :phoneP, :lienF, :lien, :dateCreation, :adresse, :responsable, :nbTeam, :message, :logo)";

            $query = $pdo->prepare($sql);

            $query->bindValue(':nameP', $nameP, PDO::PARAM_STR);
            $query->bindValue(':emailP', $emailP, PDO::PARAM_STR);
            $query->bindValue(":phoneP", $phoneP, PDO::PARAM_STR);
            $query->bindValue(":lienF", $lienF, PDO::PARAM_STR);
            $query->bindValue(":lien", $lien, PDO::PARAM_STR);
            $query->bindValue(":dateCreation", $dateCreation, PDO::PARAM_STR);
            $query->bindValue(":adresse", $adresse, PDO::PARAM_STR);
            $query->bindValue(":responsable", $responsable, PDO::PARAM_STR);
            $query->bindValue(":nbTeam", $nbTeam, PDO::PARAM_STR);
            $query->bindValue(":message", $message, PDO::PARAM_STR);
            $query->bindValue(":logo", $newfilenameLogo, PDO::PARAM_STR);


            $query->execute();


            header('location:../dashboard.php');
        }
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}
