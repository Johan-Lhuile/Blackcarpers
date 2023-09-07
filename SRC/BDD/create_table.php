<?php
require_once "../connect_BDD.php";
try {
    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = " CREATE TABLE IF NOT EXISTS `USERS` (
     idUsers INT(10) AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(50) NOT NULL, 
     surname VARCHAR(50) NOT NULL, 
     email VARCHAR(150) NOT NULL, 
     password VARCHAR(150) NOT NULL,
     point INT(3) NULL, 
     role VARCHAR(20) NOT NULL,
     isVerified BOOL,
     token VARCHAR(150) NULL

    )";

    $pdo->exec($sql);

    echo "table USERS créer";
}
catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

try {
    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = "CREATE TABLE IF NOT EXISTS `CONTACT`(
    idContact INT( 10 ) AUTO_INCREMENT PRIMARY KEY,
    nameC VARCHAR( 20 ) NOT NULL,
    emailC VARCHAR( 30 ) NOT NULL,
    message TEXT NOT NULL)";

    $pdo->exec($sql);
    echo "table CONTACT créer";

} catch(PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}