<?php
    // $host = 'localhost'; // хост
    // $dbname = 'frolov_a'; // название базы
    // $user = 'frolov_a'; // логин пользователя
    // $pass = 'e7KI13'; // пароль
    
    @$id=$_POST['id'];
    @$table=$_POST['table'];

    $db = new PDO("mysql:host=localhost;port=3307;dbname=frolov_a", "root");
    if($table == 'aircraft_type'){
        $sql = "DELETE FROM aircraft_type WHERE airplane_id = ".$id."";
    } else{
        $sql = "DELETE FROM ".$table." WHERE ".$table."_id = ".$id."";
    }
    // echo $sql;
    $res = $db->exec($sql); 
    header("Location: admin_panel.php");
?>