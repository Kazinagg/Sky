<html>
<head>
<title>Устройство самолёта</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<!-- <link rel="stylesheet" href="css/style.css"> -->
<link rel="stylesheet" href="css/dopstyle.css">
<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
<?php session_start();?>
</head>
<body bgcolor="#ffffff">
    <div Class="nav" >
        <a class="floating-button" href="Untitled-1.html" smooth style="font-size: 20px; text-decoration: none;">
            Главная
    </a>
    </div>

    <div style="padding: 100 10 0 10;">
    <div class="container">
			<div class="frame">
                <form class="form-signin" action="opp_1.php" method="POST" name="form1">
                    <label class="Color-text-2" for="znath">значение</label> 
                    <input class="form-styling" id="znath" type="text" name="znath" value="<?php echo $_SESSION['znath']; unset($_SESSION['znath'])?>" />

                    <label class="Color-text-2" for="sin">sin</label> 
                    <input class="form-styling" id="sin" type="text" name="mySin" value="<?php echo $_SESSION['mySin']; unset($_SESSION['mySin'])?>"/> 

                    <label class="Color-text-2" for="cos">cos</label> 
                    <input class="form-styling" id="cos" type="text" name="myCos" value="<?php echo $_SESSION['myCos']; unset($_SESSION['myCos'])?>"/> 

                    <label class="Color-text-2" for="tg">tg</label> 
                    <input class="form-styling" id="tg" type="text" name="tg" value="<?php echo $_SESSION['tg']; unset($_SESSION['tg'])?>"/> 

                    <label class="Color-text-2" for="ctg">ctg</label> 
                    <input class="form-styling" id="ctg" type="text" name="ctg" value="<?php echo $_SESSION['ctg']; unset($_SESSION['ctg'])?>"/> 

                    <label class="Color-text-2" for="sec">sec</label> 
                    <input class="form-styling" id="sec" type="text" name="sec" value="<?php echo $_SESSION['sec']; unset($_SESSION['sec'])?>"/> 

                    <label class="Color-text-2" for="cosec">cosec</label> 
                    <input class="form-styling" id="cosec" type="text" name="cosec" value="<?php echo $_SESSION['cosec']; unset($_SESSION['cosec'])?>"/> 

                    <input class="button" type="submit" value="Вычислить" size=10>
    
                </form>
			</div>
            
        </div>
    </div>
    

    <div Class="row">
        <div Class="Floor">
            <div>
                &nbsp; 
                <p class="Color-text-2" style = " margin: 40px;"> <big>Sky.com</big> &#xa9; </p>
                <p><a class="Color-text-2" href="Comenst.html" smooth style = "font-size: 20px; margin: 40px;">Обратная связь</a></p>
                &nbsp;
            </div>
        </div>
    </div>

</div>
</body>
</html>