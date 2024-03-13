<?php
    // $host = 'localhost'; // хост
    // $dbname = 'frolov_a'; // название базы
    // $user = 'frolov_a'; // логин пользователя
    // $pass = 'e7KI13'; // пароль
    
    @$id=$_POST['id'];
    @$table=$_POST['table'];
    @$stolb=$_POST['stolb'];
    @$val=$_POST['val'];

    // @$datas = explode(" ", $data);

    $db = new PDO("mysql:host=localhost;dbname=frolov_a", "frolov_a", "e7KI13");
    // $sql = "UPDATE `".$table."` SET `airport_name` = 'Белгородский1' WHERE `airport`.`airport_id` = ".$datas[0]."";
    if($table == 'aircraft_type'){
        // $sql = "DELETE FROM aircraft_type WHERE airplane_id = ".$id."";
        $sql = "UPDATE aircraft_type SET `".$stolb."` = ".$val." WHERE airplane_id = ".$id."";
    } else{
        $sql = "UPDATE `".$table."` SET `".$stolb."` = ".$val." WHERE `".$table."_id` = ".$id."";
    }
    
    echo $sql;


    $res = $db->exec($sql);
    // header("Location: admin_panel.php");
?>