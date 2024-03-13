<?php
$db = new PDO("mysql:host=localhost;dbname=frolov_a", "frolov_a", "e7KI13");
$sql= 'SET CHARACTER SET utf8';
$res = $db->query($sql);


$sql = "SELECT DISTINCT airport.location FROM airport";
$res = $db->query($sql);


$result = $res->FetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
exit;
?> 