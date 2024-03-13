<?php
// $host = "localhost"; /* Host name */
// $user = "root"; /* User */
// $password = ""; /* Password */
// $dbname = "realty"; /* Database name */
// $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
$db = new PDO("mysql:host=localhost;dbname=frolov_a", "frolov_a", "e7KI13");
$sql= 'SET CHARACTER SET utf8';
$res = $db->query($sql);
$sql = "select * from aircraft_type";
$res = $db->query($sql);
$result = $res->FetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
exit;
?> 