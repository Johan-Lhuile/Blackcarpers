<?php

require_once '../../SRC/connect_BDD.php';

$pdo = new PDO($attr, $user, $pass, $opts);

$sql = 'SELECT title, start, end FROM evenements';

$query = $pdo->query($sql);

$events = $query->fetchAll();

echo json_encode($events);

?>
