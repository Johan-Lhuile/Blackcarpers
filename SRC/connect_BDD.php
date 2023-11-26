<?php

try{
$host = "localhost";   //johanlr15091985.mysql.db
$user = "root";
$pass = "";
$db   = "blackcarpers";
$chrs = "utf8mb4";

$attr ="mysql:host=$host;dbname=$db;charset=$chrs";

$opts =
[ 
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false
];

}catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}