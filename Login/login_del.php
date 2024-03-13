<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["password"]);
unset($_SESSION["Full_name"]);

    header("Location: login.php");
    ?>