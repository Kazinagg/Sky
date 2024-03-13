<?php
@$name=$_POST['name'];
if ($name != null)
{ 
    $db = new PDO("mysql:host=localhost;dbname=frolov_a", "root", "");
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
    select flight.departure_time, airport.location    
        from flight, flight_airports, airport
        where (flight.airplane_id = "."'".$name."'".") 
        and (flight_airports.flight_id = flight.flight_id) 
        and (flight_airports.airport_id = airport.airport_id) 
        AND (flight_airports.departure = 0)";
    $res2 = $db->query($sql);
    $result1 = $res1->FetchAll(PDO::FETCH_NUM);
    $result2 = $res2->FetchAll(PDO::FETCH_NUM);
    echo json_encode(['result1' => $result1, 'result2' => $result2]);
}
?>
