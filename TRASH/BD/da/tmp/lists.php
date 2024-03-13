    <html>
<head>
<title>Списки</title>
<link rel="stylesheet" type="text/css" href="css/dopstyle.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery-3.6.4.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script> -->
<script defer>
$(document).ready(function() {
    $('.option').hover(function () {
        // $('#data_tab').append($(this).data('id'));
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'getdata_my.php',
            data: "name=" + $(this).data('id'),
            success: function(data){
                $('#data_tab').empty();
                $('#data_tab').append('<tr><td>рейс</td><td>время_вылета</td><td>город_вылета</td><td>время_посадки</td><td>город_посадки</td></tr>');
                $(data).each(function(index, element){
                    if(data.result1.length == 0){
                        $('#data_tab').append('<p class="Color-text-2">У борта ещё нет рейсов</p>');
                    }
                    for (i = 0; i < data.result1.length; i++) {
                        $('#data_tab').append('<tr>');
                        for (j = 0; j < 3; j++) {
                            const element1 = data.result1[i][j];
                            
                            $('#data_tab').append('<td> '+element1+'</td>');
                        }
                        for (j = 0; j < 2; j++) {
                            
                            const element2 = data.result2[i][j];
                            $('#data_tab').append('<td>'+element2+'</td>');
                        }
                        $('#data_tab').append('</tr>');
                    }
                })
            },
            error:function(){
                console.log("Ошибка");
            }
        }),
        function () {
            $('#data_tab').empty();
        }
    });
});
</script>
<!-- <script type="text/javascript">
    
const options = document.querySelectorAll('.option');
options.forEach((option) => {
    option.addEventListener('onmouseover', function (e) {
        console.log(e.target.value);

        $(document).ready(function() {
            $$('.option').hover(function (){
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'getdata_my.php',
                    data: "name=" + $(this).val(),
                    success: function(data){
                        $('#data_tab').empty();
                        $('#data_tab').append('<tr><td>рейс</td><td>время_вылета</td><td>город_вылета</td><td>время_посадки</td><td>город_посадки</td></tr>');
                        $(data).each(function(index, element){
                            if(data.result1.length == 0){
                                $('#data_tab').append('<p class="Color-text-2">У борта ещё нет рейсов</p>');
                            }
                            for (i = 0; i < data.result1.length; i++) {
                                $('#data_tab').append('<tr>');
                                for (j = 0; j < 3; j++) {
                                    const element1 = data.result1[i][j];
                                    
                                    $('#data_tab').append('<td> '+element1+'</td>');
                                }
                                for (j = 0; j < 2; j++) {
                                    
                                    const element2 = data.result2[i][j];
                                    $('#data_tab').append('<td>'+element2+'</td>');
                                }
                                $('#data_tab').append('</tr>');
                            }
                        })
                    },
                    error:function(){
                        console.log("Ошибка");
                    }
                });
            })
        });

    });
});

</script> -->
<meta charset="utf-8">
</head>
<body BGCOLOR="#ffffff">
    <div Class="nav" >
        <a class="floating-button" href="Untitled-1.html" smooth style="font-size: 20px; text-decoration: none;">
            Главная
    </a>
    </div>
    <div class="Color-text-1" style="padding-top: 80;" align="center">
        <h1 class="text-uppercase">Сведения о рейсах</h1>
    </div>
    <div class="frame2">
        <?php
            $db = new PDO("mysql:host=localhost;dbname=frolov_a;port=3307", "root");
            //Установка кодировки в UTF-8 для текущего соединениния
            $sql= 'SET CHARACTER SET utf8';
            $res = $db->query($sql);
            $sql = "select * from aircraft_type";
            $res = $db->query($sql);
            $num_results = $res->rowCount();
            echo '<p class="Color-text-2">Найдено бортов: '.$num_results.'</p>';
            $out='';
            $out .= '<div class="select">';
            $out .= '<option disabled class="Color-text-2">Выберите борт</option>';
            $result = $res->FetchAll(PDO::FETCH_NUM);
            foreach($result as $row) {
                $out .= '<div class="option Color-text-2 Block" data-id="'.$row[0].'">'.$row[0]." - ".$row[3].'</div>';
            }
            $out .='</div>';
            echo $out;
        ?>
        <table id='data_tab' border="1"> <table>
    </div>

    

</body>
</html>