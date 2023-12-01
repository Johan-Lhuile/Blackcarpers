<?php
session_start();
if ($_SESSION['USER']['role'] != 'ADMIN') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../PUBLIC/index.php');
    exit;
} else {
    $id = $_SESSION['USER']['idUsers'];
    require_once '../../SRC/security.php';
    require_once '../../SRC/connect_BDD.php';


    if (isset($_POST['firstname']) && isset($_POST['name']) || $_POST['pass1'] === $_POST['pass2']) {

        $password = password_hash($_POST['pass1'], PASSWORD_DEFAULT);

        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " UPDATE users SET surname = :firstname, name = :name, email = :email, phone = :phone, password = :password WHERE idUsers = $id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':firstname', protect($_POST['firstname']), PDO::PARAM_STR);
        $query->bindValue(':name', protect($_POST['name']), PDO::PARAM_STR);
        $query->bindValue(':email', protect($_POST['email']), PDO::PARAM_STR);
        $query->bindValue(':phone', protect($_POST['phone']), PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);
        $query->execute();

        header('location:../dashboard.php');

        $_SESSION['sucess'] = 'votre profil a bien été modifier';
    }
}
