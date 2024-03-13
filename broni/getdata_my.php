<?php
$name=$_POST['name'];
// $name=4;
if ($name != null)
{
    $db = new PDO("mysql:host=localhost;dbname=frolov_a", "frolov_a", "e7KI13");
    //Установка кодировки в UTF-8 для текущего соединениния с MySQL
    $sql= 'SET CHARACTER SET utf8';
    $res = $db->query($sql);
    $sql = "
    select flight.flight_number, flight.departure_time, airport.location    
        from flight, flight_airports, airport
        where (flight.airplane_id = "."'".$name."'".") 
        and (flight_airports.flight_id = flight.flight_id) 
        and (flight_airports.airport_id = airport.airport_id) 
        AND (flight_airports.departure = 1)";
    $res1 = $db->query($sql);
    $sql = "
    select flight.arrival_time, airport.location    
        from flight, flight_airports, airport
        where (flight.airplane_id = "."'".$name."'".") 
        and (flight_airports.flight_id = flight.flight_id) 
        and (flight_airports.airport_id = airport.airport_id) 
        AND (flight_airports.departure = 0)";
    $res2 = $db->query($sql);
    $result1 = $res1->FetchAll(PDO::FETCH_ASSOC);
    $result2 = $res2->FetchAll(PDO::FETCH_ASSOC);

    $result = ['result1' => $result1, 'result2' => $result2];
    // echo "<pre>";
    // var_dump($result);
    // echo "</pre>";
    // die;
    // $result = trans2($result);
    // $last = sizeof($result) - 1;
    // eval('$results = array_map(null, $matrix['. implode('], $matrix[', range(0, $last)) . ']);');
    echo json_encode($result);
        // $result = array_merge($result1, $result2);
    // $result = [[],[]];
    // $i = 0;
    // foreach($result1 as $resul1){
    //     $result[$i] = $resul1;
    //     $i++;
    // }
    // $i = 0;
    // foreach($result2 as $resul2){
    //     $result[$i] = $resul2;
    //     $i++;
    // }
    // $ir = 0;


    // $jr = 0;
    // echo count($result1);
    // echo "<br>";
    // for($i = 0; $i<count($result1); $i++){
    //     for($j = 0; $j<count($result1[$i]); $j++){
    //         $result[$i][$jr] = $result1[$i][$j];
    //         $jr++;
    //     }
    //     $ir++;
    // }
    // for($i = 0; $i<count($result2); $i++){
    //     for($j = 0; $j<count($result2[$i]); $j++){
    //         $result[$i][$jr] = $result2[$i][$j];
    //         $jr++;
    //     }
    //     $ir++;
    // }

    // for($i = 0; $i<count($result); $i++){
    //     for($j = 0; $j<count($result[$i]); $j++){
    //         echo $result[$i][$j];
    //         echo "|";
    //     }
    //     echo "<br>";
    // }
}
// function trans2(array $matrix)
// {
//     $last = sizeof($matrix) - 1;
//     eval('$result = array_map(null, $matrix[' 
//         . implode('], $matrix[', range(0, $last)) . ']);');
//     return $result;
// }
?>
