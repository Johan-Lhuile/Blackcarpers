<?php


if (isset($_POST['email'], $_POST['pass']) && !empty($_POST['email']) && !empty($_POST['pass'])) {

    try {

        $email = $_POST['email'];
        $passUser = $_POST['pass'];


        require_once "connect_BDD.php";

        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = "SELECT * FROM users WHERE email = :email";

        $query = $pdo->prepare($sql);

        $query->bindValue(":email", $_POST['email'], PDO::PARAM_STR);

        $query->execute();

        $users = $query->fetch();

        
        if (!$users || !password_verify($passUser, $users["password"])) {
            die("L'utilisateur et/ou le mot de passe est incorrect");

        }else{

        session_start();

        $_SESSION["USER"] = [
            "idUsers" => $users["idUsers"],
            "name" => $users["name"],
            "surname"  => $users["surname"],
            "role" => $users["role"]
        ];
            if ($_SESSION["USER"]['role'] == "ADMIN"){

            header("location:../ADMIN\dashboard.php");
        }else{
            header("location:../USERS\dashboardUsers.php");
        }
    }
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}
