<?php
    // $host = 'localhost'; // хост
    // $dbname = 'frolov_a'; // название базы
    // $user = 'frolov_a'; // логин пользователя
    // $pass = 'e7KI13'; // пароль
    @$data=$_POST['data'];
    @$table=$_POST['table'];
    @$datas = explode(" ", $data);


    // foreach($datas as $val){
    //     echo $val;
    // }
    // echo "<br>";

    $db = new PDO("mysql:host=localhost;dbname=frolov_a", "frolov_a", "e7KI13");
    
    $sql = "INSERT INTO `".$table."` VALUES (NULL ";
    foreach($datas as $val){
        $sql = $sql.','.$val;
    }
    $sql = $sql.")";
    // echo $sql;
    $res = $db->exec($sql); 
    header("Location: admin_panel.php");
?>