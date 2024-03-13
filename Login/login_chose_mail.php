<?php
    $email = $_POST["email"];
    $db = new PDO("mysql:host=localhost;dbname=frolov_a", "frolov_a", "e7KI13");
    $sql= 'SET CHARACTER SET utf8';
    $res = $db->query($sql);
    // echo $airport_id_dep;echo '<br>';
    // echo $airport_id_dep_arri;echo '<br>';
    // echo $kogda;echo '<br>';

    $sql = "SELECT * FROM passengers WHERE passengers.Email = '".$email."'";
    $res = $db->query($sql);
    $result = $res->FETCHALL(PDO::FETCH_ASSOC);

    // return count($result);
    echo json_encode($result);
exit;
    // if(count($result) == 0){
    //     return 1;
    // }else{
    //     return 0;
    // }
?>