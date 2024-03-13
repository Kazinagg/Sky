<html>
<head>
<title>Устройство самолёта</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link rel="stylesheet" href="../css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../js/vue.js"></script>
<script src='../axios/dist/axios.min.js'></script>
<!-- <link rel="stylesheet" href="css/dopstyle.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
<?php session_start();?>

</head>
<body bgcolor="#ffffff">
    <div Class="navs" >
        <a class="floating-button" href="http://localhost:9999/frolov_a/Web/kursath/Sky/" smooth style="font-size: 20px; text-decoration: none;">
            Главная
    </a>
    </div>

    <div style="padding: 40 10 0 10;">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

<div class="container">
    <div class="frame">
    <div class="nav">
        
        <h3 class="Color-text-2" style="text-align: center">Регистрация пользователя</h3>
        
    </div>
    <div id='myapp'>
			<!-- <form class="form-signin" action="login_2.php" method="POST" name="form1">
                <label for="email">email</label>
                <input class="form-styling" type="text" name="email" value="<?php //echo $_SESSION['email']?>"/>
                <label for="password">Password</label>
                <input class="form-styling" type="text" name="password" value="<?php //echo $_SESSION['password']?>"/>
                <input type="checkbox" id="checkbox"/>Keep me signed in

                <input type="submit" class="btn-signup" value="Sign in"></input>

			</form> -->
        
			<form style="padding-left: 37px; padding-right: 37px; padding-top: 55px;" action="login_1.php" method="POST" name="form1">
                <label for="Full_name">ФИО</label>
                <input required class="form-styling" type="text" name="Full_name" />
                <label for="email">Email</label>
                <input required @blur="GetSelect()" class="form-styling" type="text" name="email" v-model="email" />

                <label for="Phone_number">Phone_number Series</label>
                <input required class="form-styling" type="text" name="Phone_number" />

                <label for="passport_Series">passport Series</label>
                <input required class="form-styling" type="text" name="passport_Series" />

                <label for="passport_number">Passpassport number</label>
                <input required class="form-styling" type="text" name="passport_number" />

                <label for="password">Password</label>
                <input required class="form-styling" id="p1" type="password" name="password" />
                <label for="confirmpassword">Confirm password</label>
                <input required class="form-styling" id="p2" type="password" name="confirmpassword" />
                <input type="submit" class="btn-signup" value="Sign Up"></input>
			</form>
            <p class="btn-signup" id="valid"></p><p class="btn-signup" v-if="results.length">Такая почта уже есть</p>
            
        </div>
        
        <!-- <div class="forgot">
        <a href="#">Forgot your password?</a>
    </div> -->
    
    
</div>
    
<!-- <a id="refresh" value="Refresh" href="login_del.php"> <img src="https://w7.pngwing.com/pngs/365/764/png-transparent-computer-icons-refresh-free-one-button-reload-text-logo-monochrome-thumbnail.png" height="25"></img>
    <svg class="refreshicon"   version="1.1" id="Capa_1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="25px" height="25px" viewBox="0 0 322.447 322.447" style="enable-background:new 0 0 322.447 322.447;"
        xml:space="preserve">
        
    </svg>
</a> -->
</div>
<!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>

    <script src="../js/index.js"></script> -->

    <script>
        $(document).ready(function() {$("#p1, #p2").keyup(validate);});

function validate() {
    var pass1 = $("#p1").val();
    var pass2 = $("#p2").val();

    if(pass1.length < 6) {$("#valid").text("слабый пароль");
    } else if (pass1 == pass2) {$("#valid").text("Пароли совпадают");
    } else if(pass1 != pass2) {$("#valid").text("Пароли не совпадают");}
}
    </script>


<script>
            var app = new Vue({
                el: '#myapp',
                data: {
                    results: [],
                    email: '',
                },

                computed: {},
                methods: {
                    GetSelect: function(){
                        // console.log("sdfg");
                        let formData = new FormData();
                        formData.append('email', this.email)
                        axios({
                            method: 'post',
                            url: 'login_chose_mail.php',
                            data: formData,
                            config: { headers: {'Content-Type': 'multipart/form-data' }}
                        }).then(function (response) {
                            // console.log(response.data);
                            // console.log(response);
                            app.results = response.data;
                            console.log(app.results);
                        }).catch(function (error) {
                            console.log(error);
                        });
                    },

                }
            })
        </script>
        
    </div>
    

</body>
</html>