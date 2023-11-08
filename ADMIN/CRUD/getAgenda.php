<?php

require_once '../../SRC/connect_BDD.php';

$pdo = new PDO($attr, $user, $pass, $opts);

$sql = 'SELECT * FROM Agenda';

$query = $pdo->query($sql);

$agenda = $query->fetchAll();

http_response_code(200);

echo json_encode($agenda);

?>
