<?php
session_start();
$id = $_SESSION['USER']['idUsers'];
if ($_SESSION['USER']['role'] != 'USER') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../../PUBLIC/index.php');
    exit;
} else {
    require_once '../../SRC/security.php';
    require_once '../../SRC/connect_BDD.php';


    if (isset($_POST['firstname']) && isset($_POST['name'])) {

        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " UPDATE users SET surname = :firstname, name = :name, email = :email, phone = :phone WHERE idUsers = $id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':firstname', protect($_POST['firstname']), PDO::PARAM_STR);
        $query->bindValue(':name', protect($_POST['name']), PDO::PARAM_STR);
        $query->bindValue(':email', protect($_POST['email']), PDO::PARAM_STR);
        $query->bindValue(':phone', protect($_POST['phone']), PDO::PARAM_STR);

        $query->execute();

        header('location:../dashboardUsers.php');
    }


    if (isset($_POST['pass1']) && $_POST['pass1'] === $_POST['pass2']) {

        $password = password_hash($_POST['pass1'], PASSWORD_DEFAULT);

        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " UPDATE users SET password = :password,  WHERE idUsers = $id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':password', $password, PDO::PARAM_STR);

        $query->execute();
        header('location:../dashboardUsers.php');
    }
}
