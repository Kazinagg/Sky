<!-- <script>
    alert( document.cookie );
</script> -->
<?php
session_start();
// echo 'ЗАЕБАЛ';
    @$email=$_POST['email'];
    @$password=$_POST['password'];
    @$Full_name=$_POST['Full_name'];
    // echo $email;
    // echo "ЗАЕБАЛ";
    // echo $password;
    $_SESSION['email'] = $email; 
    $_SESSION['password'] = $password; 
    $_SESSION['Full_name'] = $Full_name; 
    //$_COOKIE['email'];
    //$_COOKIE['password'];
    //setcookie('email', $email, mktime(0,0,0,01,25,2024));
    //setcookie('password', $password, mktime(0,0,0,01,25,2024));
    echo $_SESSION['email'];
    echo $_SESSION['password'];
    header("Location: login.php");
?>