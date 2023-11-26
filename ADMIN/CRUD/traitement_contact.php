<?php

try {
    require_once "../../SRC/security.php";

    $name = protect($_POST['name']);
    $phone = protect($_POST['phone']);
    $email = protect(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $message = protect($_POST['message']);

    require_once "../../SRC/connect_BDD.php";

    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = "INSERT INTO contact (nameC, emailC, phoneC, message) VALUES (:name, :email, :phone, :message)";

    $query = $pdo->prepare($sql);

    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->bindValue(":phone", $phone, PDO::PARAM_STR);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':message', $message, PDO::PARAM_STR);

    $query->execute();

    $_SESSION['sucess'] = 'Votre email a bien été envoyé';
    header('location:../index.php');
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
