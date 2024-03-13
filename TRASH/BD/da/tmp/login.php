<html>
<head>
<title>Устройство самолёта</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<!-- <link rel="stylesheet" href="css/dopstyle.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
<?php session_start();?>
<script>
    alert(
            <?php 
                if ($_SESSION['Full_name']){
                    echo "'".'приветствуем '.$_SESSION['Full_name']."'";
                } else{
                    echo "'"."Пройдите регистрацию"."'";
                    //echo "'".$_SESSION['Full_name']."'";
                }
            ?> 
        );
</script>

</head>
<body bgcolor="#ffffff">
    <div Class="snav" >
        <a class="floating-button" href="Untitled-1.html" smooth style="font-size: 20px; text-decoration: none;">
            Главная
    </a>
    </div>

    <div style="padding: 100 10 0 10;">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

<div class="container">
    <div class="frame">
    <div class="nav">
        <ul class"links">
        <li class="signin-active"><a class="btn">Sign in</a></li>
        <li class="signup-inactive"><a class="btn">Sign up </a></li>
        </ul>
    </div>
    <div >
			<form class="form-signin" action="" method="POST" name="form1">
                <label for="email">email</label>
                <input class="form-styling" type="text" name="email" value="<?php echo $_SESSION['email']?>"/>
                <label for="password">Password</label>
                <input class="form-styling" type="text" name="password" value="<?php echo $_SESSION['password']?>"/>
                <input type="checkbox" id="checkbox"/>Keep me signed in
                <!-- <label for="checkbox" >Keep me signed in</label> -->
                <!-- <div class="btn-animate"> -->
                <!-- <a class="btn-signin">Sign in</a> -->
                <input type="submit" class="btn-signup" value="Sign in"></input>
                <!-- </div> -->
			</form>
        
			<form class="form-signup" action="login_1.php" method="POST" name="form1">
                <label for="Full_name">ФИО</label>
                <input class="form-styling" type="text" name="Full_name" />
                <label for="email">Email</label>
                <input class="form-styling" type="text" name="email" />
                <label for="password">Password</label>
                <input class="form-styling" type="text" name="password" />
                <label for="confirmpassword">Confirm password</label>
                <input class="form-styling" type="text" name="confirmpassword" />
                <input type="submit" class="btn-signup" value="Sign Up"></input>
			</form>
        
            
        </div>
        
        <div class="forgot">
        <a href="#">Forgot your password?</a>
    </div>
    
    
</div>
    
<a id="refresh" value="Refresh" href="login_del.php"> <img src="https://w7.pngwing.com/pngs/365/764/png-transparent-computer-icons-refresh-free-one-button-reload-text-logo-monochrome-thumbnail.png" height="25"></img>
    <svg class="refreshicon"   version="1.1" id="Capa_1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="25px" height="25px" viewBox="0 0 322.447 322.447" style="enable-background:new 0 0 322.447 322.447;"
        xml:space="preserve">
        
    </svg>
</a>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>

    <script src="js/index.js"></script>
        
    </div>
    

</body>
</html>