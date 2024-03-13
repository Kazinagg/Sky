<html>
<head>
<title>Админ панель</title>
<link rel="stylesheet" type="text/css" href="dopstyles.css">
<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
        
        
        

</head>
<body bgcolor="#ffffff">
    <div Class="nav" >
        <a class="floating-button" href="http://localhost:9999/frolov_a/Web/kursath/Sky/" smooth style="font-size: 20px; text-decoration: none;">
            Главная
    </a>
    </div>
    
    <div style="padding: 100 10 0 10;">
        <div class="Block" style="display: flex">
<div class="Block">
                <h4>Добавление новых данных</h4> 
    
    
                <form name ="form2" action="L6_1.php" method="POST"> 
                <p> Введите данные через пробел без id</p> 
                <input type="text" name="data" size =50 >
                <p> Введите название таблицы</p> 
                <input type="text" name="table" size =50 ><br><br>
                <input type="submit" value="добавить">
                </form>
</div>
<br>

            <div class="Block">
                <h4>удаление данных по их id</h4>
                <form name ="form2" action="L6_2.php" method="POST"> 
                <p> Введите id</p> 
                <input type="text" name="id" size =50 >
                <p> Введите название таблицы</p> 
                <input type="text" name="table" size =50 ><br><br>
                <input type="submit" value="удалить">
                </form>
            </div>
<br>
            <div class="Block">
                <h4>изменить данных</h4>
                <form name ="form2" action="L6_3.php" method="POST"> 
                
                <p> Введите название таблицы</p> 
                <input type="text" name="table" size =50 >
                <p> Введите id</p> 
                <input type="text" name="id" size =50 >
                <p> Введите столбец</p> 
                <input type="text" name="stolb" size =50 >
                <p> Введите значение</p> 
                <input type="text" name="val" size =50 >
                <br><br>
                <input type="submit" value="изменить">
                </form>
            </div>
            <br>
            <div>
                <form name ="form2" action="/admin_panel.php" method="POST"> 
                <input type="submit" value="обновить все таблицы">
                </form>
            </div>
            </div>

            <!-- <div class="Block"> -->
            <div style="display: flex; flex-direction: row; flex-wrap: wrap;">
                <?php
                echo '<br>';
                echo '<div class="Block">';
                    $db = new PDO("mysql:host=localhost;dbname=frolov_a", "frolov_a", "e7KI13");
                    $sql = "SELECT * FROM airport";
                    $stmt = $db->query($sql);
                    $res = $stmt->FETCHALL(PDO::FETCH_NUM);

                    $sql2 = "SHOW COLUMNS FROM airport";
                    $stmt2 = $db->query($sql2);
                    $res2 = $stmt2->FETCHALL(PDO::FETCH_NUM);



                    echo 'airport';
                    echo '<table>';
                        echo '<tr>';
                            foreach($res2 as $arr2) {
                                // echo $arr2[0];
                                echo '<th>'.$arr2[0].'</td>';
                            }
                            // echo '<th>'.'airport_id'.'</td>';
                            // echo '<th>'.'location'.'</td>';
                            // echo '<th>'.'airport_name'.'</td>';
                        echo '</tr>';
                        foreach($res as $arr) {
                            echo '<tr>';
                            for ($j=0;$j < count($arr); $j++){
                                echo '<td>'.$arr[$j].'</td>';
                            }
                            echo '</tr>';
                            }
                    echo '</table>';
                    echo '</div>';
    
                    echo '<br>';
    
                    echo '<div class="Block">';
                    $sql = "SELECT * FROM aircraft_type";
                    $stmt = $db->query($sql);
                    $res = $stmt->FETCHALL(PDO::FETCH_NUM);

                    $sql2 = "SHOW COLUMNS FROM aircraft_type";
                    $stmt2 = $db->query($sql2);
                    $res2 = $stmt2->FETCHALL(PDO::FETCH_NUM);



                    echo 'aircraft_type';
                    echo '<table>';
                        echo '<tr>';
                            foreach($res2 as $arr2) {
                                // echo $arr2[0];
                                echo '<th>'.$arr2[0].'</td>';
                            }
                            // echo '<th>'.'airport_id'.'</td>';
                            // echo '<th>'.'location'.'</td>';
                            // echo '<th>'.'airport_name'.'</td>';
                        echo '</tr>';
                        foreach($res as $arr) {
                            echo '<tr>';
                            for ($j=0;$j < count($arr); $j++){
                                echo '<td>'.$arr[$j].'</td>';
                            }
                            echo '</tr>';
                            }
                    echo '</table>';
                    echo '</div>';
    
                    echo '<br>';
                    echo '<div class="Block">';
                    $sql = "SELECT * FROM airplane";
                    $stmt = $db->query($sql);
                    $res = $stmt->FETCHALL(PDO::FETCH_NUM);

                    $sql2 = "SHOW COLUMNS FROM airplane";
                    $stmt2 = $db->query($sql2);
                    $res2 = $stmt2->FETCHALL(PDO::FETCH_NUM);



                    echo 'airplane';
                    echo '<table>';
                        echo '<tr>';
                            foreach($res2 as $arr2) {
                                // echo $arr2[0];
                                echo '<th>'.$arr2[0].'</td>';
                            }
                            // echo '<th>'.'airport_id'.'</td>';
                            // echo '<th>'.'location'.'</td>';
                            // echo '<th>'.'airport_name'.'</td>';
                        echo '</tr>';
                        foreach($res as $arr) {
                            echo '<tr>';
                            for ($j=0;$j < count($arr); $j++){
                                echo '<td>'.$arr[$j].'</td>';
                            }
                            echo '</tr>';
                            }
                    echo '</table>';
                    echo '</div>';
    
                    echo '<br>';
                    echo '<div class="Block">';
                    $sql = "SELECT * FROM flight";
                    $stmt = $db->query($sql);
                    $res = $stmt->FETCHALL(PDO::FETCH_NUM);

                    $sql2 = "SHOW COLUMNS FROM flight";
                    $stmt2 = $db->query($sql2);
                    $res2 = $stmt2->FETCHALL(PDO::FETCH_NUM);



                    echo 'flight';
                    echo '<table>';
                        echo '<tr>';
                            foreach($res2 as $arr2) {
                                // echo $arr2[0];
                                echo '<th>'.$arr2[0].'</td>';
                            }
                            // echo '<th>'.'airport_id'.'</td>';
                            // echo '<th>'.'location'.'</td>';
                            // echo '<th>'.'airport_name'.'</td>';
                        echo '</tr>';
                        foreach($res as $arr) {
                            echo '<tr>';
                            for ($j=0;$j < count($arr); $j++){
                                echo '<td>'.$arr[$j].'</td>';
                            }
                            echo '</tr>';
                            }
                    echo '</table>';
                    echo '</div>';
    
                    echo '<br>';
                    echo '<div class="Block">';
                    $sql = "SELECT * FROM flight_airports";
                    $stmt = $db->query($sql);
                    $res = $stmt->FETCHALL(PDO::FETCH_NUM);

                    $sql2 = "SHOW COLUMNS FROM flight_airports";
                    $stmt2 = $db->query($sql2);
                    $res2 = $stmt2->FETCHALL(PDO::FETCH_NUM);



                    echo 'flight_airports';
                    echo '<table>';
                        echo '<tr>';
                            foreach($res2 as $arr2) {
                                // echo $arr2[0];
                                echo '<th>'.$arr2[0].'</td>';
                            }
                            // echo '<th>'.'airport_id'.'</td>';
                            // echo '<th>'.'location'.'</td>';
                            // echo '<th>'.'airport_name'.'</td>';
                        echo '</tr>';
                        foreach($res as $arr) {
                            echo '<tr>';
                            for ($j=0;$j < count($arr); $j++){
                                echo '<td>'.$arr[$j].'</td>';
                            }
                            echo '</tr>';
                            }
                    echo '</table>';
                    echo '</div>';
    
                    echo '<br>';
                    echo '<div class="Block">';
                    $sql = "SELECT * FROM passengers";
                    $stmt = $db->query($sql);
                    $res = $stmt->FETCHALL(PDO::FETCH_NUM);

                    $sql2 = "SHOW COLUMNS FROM passengers";
                    $stmt2 = $db->query($sql2);
                    $res2 = $stmt2->FETCHALL(PDO::FETCH_NUM);



                    echo 'passengers';
                    echo '<table>';
                        echo '<tr>';
                            foreach($res2 as $arr2) {
                                // echo $arr2[0];
                                echo '<th>'.$arr2[0].'</td>';
                            }
                            // echo '<th>'.'airport_id'.'</td>';
                            // echo '<th>'.'location'.'</td>';
                            // echo '<th>'.'airport_name'.'</td>';
                        echo '</tr>';
                        foreach($res as $arr) {
                            echo '<tr>';
                            for ($j=0;$j < count($arr); $j++){
                                echo '<td>'.$arr[$j].'</td>';
                            }
                            echo '</tr>';
                            }
                    echo '</table>';
                    echo '</div>';
    
                    echo '<br>';
                    echo '<div class="Block">';
                    $sql = "SELECT * FROM ticket";
                    $stmt = $db->query($sql);
                    $res = $stmt->FETCHALL(PDO::FETCH_NUM);

                    $sql2 = "SHOW COLUMNS FROM ticket";
                    $stmt2 = $db->query($sql2);
                    $res2 = $stmt2->FETCHALL(PDO::FETCH_NUM);



                    echo 'ticket';
                    echo '<table>';
                        echo '<tr>';
                            foreach($res2 as $arr2) {
                                // echo $arr2[0];
                                echo '<th>'.$arr2[0].'</td>';
                            }
                            // echo '<th>'.'airport_id'.'</td>';
                            // echo '<th>'.'location'.'</td>';
                            // echo '<th>'.'airport_name'.'</td>';
                        echo '</tr>';
                        foreach($res as $arr) {
                            echo '<tr>';
                            for ($j=0;$j < count($arr); $j++){
                                echo '<td>'.$arr[$j].'</td>';
                            }
                            echo '</tr>';
                            }
                    echo '</table>';
                    echo '</div>';
    
                    echo '<br>';
                ?>
            </div>
<!-- </div> -->
            
        </div>
        
        </div>
    </div>

</body>
</html>
