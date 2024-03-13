<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Список рейсов</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #23345f;
      color: #fff;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    #bron{
      height: 30;
    }
    select {border:none;
      /* width: 240px; */
      /* height: 35px; */
      /* padding: 4px; */
      /* border-radius:4px; */
      /* box-shadow: 2px 2px 8px #999; */
      background: #374c83f5;
      /* border: none;
      outline: none;
      display: inline-block;
      -webkit-appearance:none;
      -moz-appearance: none;
      appearance: none;
      cursor: pointer; */
      }
  </style>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<!-- <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script> -->
<script src="../js/vue.js"></script>
<script src='../axios/dist/axios.min.js'></script>

<meta charset="utf-8">
</head>
<body BGCOLOR="#ffffff">
    <div Class="navs" >
        <a class="floating-button" href="http://localhost:9999/frolov_a/Web/kursath/Sky/" smooth style="font-size: 20px; text-decoration: none;">
            Главная
    </a>
    <a class="floating-button" href="http://localhost:9999/frolov_a/Web/kursath/Sky/Login/login.php" smooth style="font-size: 20px; text-decoration: none; float: right; border-radius: 100px;">
                        <img src="http://localhost:9999/frolov_a/Web/kursath/Sky/Pict/user_icon.png" width="40" height="40" style="margin: 5 0 5 0; " alt="" >
                </a>
    </div>
    <div class="container">
    <h1>Список рейсов</h1>
    <table>
      <thead>
        <tr>
          <th>Номер рейса</th>
          <th>Город отправления</th>
          <th>Город прибытия</th>
          <th>Время отправления</th>
          <th>Время прибытия</th>
          <th>Авиокомпания</th>
          <th>Борт</th>
          <th>Цена</th>
        </tr>
      </thead>
      <!-- <select name="plate" id="plate">
        <oprion>
      </select> -->
      <tbody>
        <?php
            $airport_id_dep=$_POST['airport_id_dep'];
            $airport_id_dep_arri=$_POST['airport_id_dep_arri'];
            $kogda=$_POST['kogda'];
            $otkyda=$_POST['otkyda'];
            $kyda=$_POST['kyda'];
            if($kogda != null and $airport_id_dep_arri != null and $airport_id_dep != null){
                $db = new PDO("mysql:host=localhost;dbname=frolov_a", "frolov_a", "e7KI13");
                $sql= 'SET CHARACTER SET utf8';
                $res = $db->query($sql);
                // echo $airport_id_dep;echo '<br>';
                // echo $airport_id_dep_arri;echo '<br>';
                // echo $kogda;echo '<br>';
    
                $sql = "SELECT * FROM flight, airplane, aircraft_type
                WHERE EXISTS
                (SELECT flight_id FROM flight_airports WHERE departure = 1 AND airport_id = ".$airport_id_dep." AND flight_id = flight.flight_id)
                AND EXISTS
                (SELECT flight_id FROM flight_airports WHERE departure = 0 AND airport_id = ".$airport_id_dep_arri." AND flight_id = flight.flight_id)
                AND departure_time >= "."'".$kogda."'"."
                AND flight.airline_id = airplane.airline_id
                AND flight.airplane_id = aircraft_type.airplane_id";
                $res = $db->query($sql);
                $result = $res->FETCHALL(PDO::FETCH_ASSOC);

                


                if (count($result) > 0) {
                foreach($result as $arr) {
                    $sql= 'SELECT * FROM ticket WHERE flight_id = ' . $arr["flight_id"] . '' ;
                    $res2 = $db->query($sql);
                    $tickets = $res2->FETCHALL(PDO::FETCH_ASSOC);
                    
                    echo '<form name="' . $arr["flight_id"] . '" action="tiket.php" method="post" style="padding-top: 18;">';
                    echo "<tr>";
                    // for ($j=1;$j < count($arr); $j++){
                        echo "<td>" . $arr["flight_number"] . "</td>";
                        echo "<td>" . $otkyda . "</td>";
                        echo "<td>" . $kyda . "</td>";
                        echo "<td>" . $arr["departure_time"] . "</td>";
                        echo "<td>" . $arr["arrival_time"] . "</td>";
                        echo "<td>" . $arr["airline_name"] . "</td>";
                        echo "<td>" . $arr["name"] . "</td>";
                        echo "<td>" . $arr["price"] . "</td>";
                    // }
                    echo "</tr>";
                    echo "<div style='display: flex; flex-direction: row;' >";
                    echo '<input id="bron" class="gradient-button-right Color-text-2" style="border-radius: 10px 0 0 10px;" type="submit" name="enter" value="забронировать" />';
                    echo '<div id="bron" class="gradient-tex Color-text-2" style="background: #374c83f5; padding: 5;" name="flight_id" value="рейс ' . $arr["flight_id"] . '" />рейс ' . $arr["flight_id"] . '</div>';
                    echo '<input  type="hidden" name="flight_id" value="' . $arr["flight_id"] . '" /></input>';
                    echo '<input  type="hidden" name="flight_number" value="' . $arr["flight_number"] . '" /></input>';
                    echo '<input  type="hidden" name="departure_time" value="' . $arr["departure_time"] . '" /></input>';
                    echo '<input  type="hidden" name="otkyda" value="' . $otkyda . '" /></input>';
                    echo '<input  type="hidden" name="kyda" value="' . $kyda . '" /></input>';
                    echo '<select class="Color-text-2" name="plate" required>';
                                  echo '<option class="Color-text-2" disabled>Место</option>; ';
                                  for($i = 1; $i < $arr["capacity"]; $i++){
                                    
                                    $v = 0;
                                    foreach($tickets as $ticket) {
                                      if($ticket["place_number"] == $i){
                                        $v = 1;
                                      }
                                    };
                                    if($v == 0){
                                      echo '<option class="Color-text-2">';
                                      echo $i;
                                      echo '</option>';
                                    }
                                    
                                  }
                                  echo '</select>';
                    echo '<input id="bron" class="gradient-tex Color-text-2" style="background: #374c83f5;" type="text" name="email" required placeholder="введите почту" />';
                    echo "</div>";
                    echo '</form>';
                }
            }else {
                  echo "<tr><td colspan='5'>Нет результатов</td></tr>";
                }
        }
        // if ($result->num_rows > 0) {
        //   while($row = $result->fetch_assoc()) {
        //     echo "<tr><td>" . $row["flight_number"] . "</td><td>" . $row["departure_city"] . "</td><td>" . $row["arrival_city"] . "</td><td>" . $row["departure_time"] . "</td><td>" . $row["arrival_time"] . "</td></tr>";
        //   }
        // } else {
        //   echo "<tr><td colspan='5'>Нет результатов</td></tr>";
        // }
        // $conn->close();
        ?>
      </tbody>
    </table>
  </div>



    <?php
        
           
        //         echo '<div>';
        //         // echo '<p>рейсы</p>';
                
        //         foreach($result as $arr) {
        //             echo '<form name="forma_zakaza" action="broni\bron.php" method="post" style="padding-top: 18;">';
        //             foreach($res2 as $arr2) {
        //                 // echo $arr2[0];
        //                 echo ' '.$arr2[0].' ';
        //             }
        //             echo '<br>';
        //             for ($j=0;$j < count($arr); $j++){
        //                 echo ' '.$arr[$j].' ';
        //             }
        //             echo '<input class="gradient-button-left" type="submit" name="enter" value="забронировать" />';
        //             echo '<br>';
        //         }
        // }
        // else{
        //     echo 'ТАКИХ РЕЙСОВ НЕТ';
        // }
        ?>
            </div>


</body>
</html>