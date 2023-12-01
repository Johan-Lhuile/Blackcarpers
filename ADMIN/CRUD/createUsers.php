<?php
session_start();
if ($_SESSION['USER']['role'] != 'ADMIN') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../PUBLIC/index.php');
    exit;
} else {
    try {
        require_once "../../SRC/security.php";

        $name = protect($_POST['name']);
        $surname = protect($_POST['surname']);
        $email = protect(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

        $token = bin2hex(random_bytes(16));

        require_once "../../SRC/connect_BDD.php";

        $pdo = new PDO($attr, $user, $pass, $opts);

        $pass = bin2hex(random_bytes(8));

        $pass2 = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, surname, email, password, role, token) VALUES (:name, :surname, :email, :pass, :user, :token)";

        $query = $pdo->prepare($sql);

        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':surname', $surname, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(":pass", $pass2, PDO::PARAM_STR);
        $query->bindValue(":user", "USER", PDO::PARAM_STR);
        $query->bindValue(":token", $token, PDO::PARAM_STR);


        $query->execute();


        $adress = $email;
        $subject = "Bienvenue mon Intenable";
        $message = "Bonjour, $surname $name. 
        
    Bienvenue sur le site BLACKCARPERS. Vous avez été rajouté par votre Capitaine.

    Vous pouvez vous connecter avec votre adresse mail et le mot de passe provisoire ci-dessous:

                         Mot de passe: $pass";

        mail($adress, $subject, $message);


        header('location:../dashboard.php');
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}
