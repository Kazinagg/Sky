<?php
// $host = "localhost"; /* Host name */
// $user = "root"; /* User */
// $password = ""; /* Password */
// $dbname = "realty"; /* Database name */
// $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
$otkyda=$_POST['otkyda'];
$kyda=$_POST['kyda'];



$db = new PDO("mysql:host=localhost;dbname=frolov_a", "frolov_a", "e7KI13");
$sql= 'SET CHARACTER SET utf8';
$res = $db->query($sql);


$sql = "SELECT * FROM airport WHERE airport.location = "."'".$otkyda."'";
$res1 = $db->query($sql);

$sql = "SELECT * FROM airport WHERE airport.location = "."'".$kyda."'";
$res2 = $db->query($sql);


$result1 = $res1->FetchAll(PDO::FETCH_ASSOC);
$result2 = $res2->FetchAll(PDO::FETCH_ASSOC);

$result = ['result1' => $result1, 'result2' => $result2];

echo json_encode($result);
exit;
?> 