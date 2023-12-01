<?php

require_once '../INCLUDES/mail.php';
require_once "../SRC/connect_BDD.php";

if(isset($_POST['email']) && empty($_POST['email'])){
    $_SESSION['error'] = "Veuillez entrer votre Email";
    header('Location: ../PUBLIC/index.php');
}else{
if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $pdo = new PDO($attr, $user, $pass, $opts);

    
    $sql = "SELECT * FROM users WHERE email = :email";

    $query = $pdo->prepare($sql);

    $query->bindValue(":email", $_POST['email'], PDO::PARAM_STR);

    $query->execute();

    $users = $query->fetch();

    $id = $users['idUsers'];
    $token = $users['token'];

    if (!$users) {
        $_SESSION['error'] = "Cet email est incorrect";

    }else{
        $url = "http://localhost/blackcarpers/ADMIN/nouveauMDP.php?id=$id&token=$token";
    $adress = $_POST['email'];
    $subject = "Réinitialiser votre mot de passe; ";
    $message = "Bonjour,  
        
    Vous avez demandé à réinitialiser votre mot de passe, Veuillez cliquer sur le lien ci dessous
    
    $url";

                        

    mail($adress, $subject, $message);
    
        header('Location: ../PUBLIC/index.php');
}}}