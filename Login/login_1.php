<!-- <script>
    alert( document.cookie );
</script> -->
<?php
$Full_name=$_POST['Full_name'];
$name = explode(" ", $Full_name);
$email=$_POST['email'];
$passport_Series=$_POST['passport_Series'];
$passport_number=$_POST['passport_number'];
$password=$_POST['password'];
$Phone_number=$_POST['Phone_number'];

$db = new PDO("mysql:host=localhost;dbname=frolov_a", "frolov_a", "e7KI13");
$sql= 'SET CHARACTER SET utf8';
$res = $db->query($sql);
echo "".$name[0].", ".$name[1].", ".$name[2].", ".$Phone_number.", ".$passport_Series.", ".$passport_number.", ".$email.", ".$password.")";
$sql = "INSERT INTO `passengers` (`passenger_id`, `surname`, `Name`, `patronymic`, `Phone_number`, `passport_Series`, `passport_number`, `Email`, `password`) 
VALUES (NULL, '".$name[0]."', '".$name[1]."', '".$name[2]."', ".$Phone_number.", ".$passport_Series.", ".$passport_number.", '".$email."', '".$password."')";
    $db->query($sql);

    header("Location: /");
?>
<?php

// session_start();
// // echo 'ЗАЕБАЛ';
//     @$email=$_POST['email'];
//     @$password=$_POST['password'];
//     @$Full_name=$_POST['Full_name'];
//     // echo $email;
//     // echo "ЗАЕБАЛ";
//     // echo $password;
//     $_SESSION['email'] = $email; 
//     $_SESSION['password'] = $password; 
//     $_SESSION['Full_name'] = $Full_name; 
//     //$_COOKIE['email'];
//     //$_COOKIE['password'];
//     //setcookie('email', $email, mktime(0,0,0,01,25,2024));
//     //setcookie('password', $password, mktime(0,0,0,01,25,2024));
//     echo $_SESSION['email'];
//     echo $_SESSION['password'];
    // @$email=$_POST['email'];
    // @$password=$_POST['password'];
    // @$Full_name=$_POST['Full_name'];
    
    // header("Location: /");
?>