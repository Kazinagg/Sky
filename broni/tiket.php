<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ваш билет</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .ticket {
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border-radius: 5px;
            padding: 20px;
            width: 600px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .ticket-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .ticket-header img {
            height: 40px;
        }
        .ticket-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .ticket-info div {
            width: 48%;
        }
        .ticket-info h2 {
            margin: 0 0 10px;
            font-size: 18px;
            font-weight: bold;
        }
        .ticket-info p {
            margin: 5px 0;
            font-size: 16px;
        }
        .ticket-footer {
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    class FlightTicket {
        private $passengerName;
        private $passengerEmail;
        private $flightNumber;
        private $departureAirport;
        private $arrivalAirport;
        private $departureDate;
        private $seatNumber;

        public function __construct($passengerName, $passengerEmail, $flightNumber, $departureAirport, $arrivalAirport, $departureDate, $seatNumber) {
            $this->passengerName = $passengerName;
            $this->passengerEmail = $passengerEmail;
            $this->flightNumber = $flightNumber;
            $this->departureAirport = $departureAirport;
            $this->arrivalAirport = $arrivalAirport;
            $this->departureDate = $departureDate;
            $this->seatNumber = $seatNumber;
        }

        public function printTicket() {
            echo "<div class='ticket'>";
            echo "<div class='ticket-header'>";
            echo "<h1>Электронный билет</h1>";
            echo "<img src='/pict/sky.com.png' alt='Логотип авиакомпании'>";
            echo "</div>";
            echo "<div class='ticket-info'>";
            echo "<div>";
            echo "<h2>Пассажир</h2>";
            echo "<p>Имя: " . $this->passengerName . "</p>";
            echo "<p>Email: " . $this->passengerEmail . "</p>";
            echo "<p>Номер места: " . $this->seatNumber . "</p>";
            echo "</div>";
            echo "<div>";
            echo "<h2>Рейс</h2>";
            echo "<p>Номер рейса: " . $this->flightNumber . "</p>";
            echo "<p>Город вылета: " . $this->departureAirport . "</p>";
            echo "<p>Город прилета: " . $this->arrivalAirport . "</p>";
            echo "<p>Дата вылета: " . $this->departureDate . "</p>";
            echo "</div>";
            echo "</div>";
            echo "<div class='ticket-footer'>";
            echo "Пожалуйста, сохраните этот билет и предъявите его при регистрации на рейс.";
            echo "</div>";
            echo "</div>";
        }
    }
    
    
        $email = $_POST['email'];
        $plate = $_POST['plate'];
        $flight_id = $_POST['flight_id'];
        $flight_number = $_POST['flight_number'];
        $departure_time = $_POST['departure_time'];
        $otkyda = $_POST['otkyda'];
        $kyda = $_POST['kyda'];
        

        $db = new PDO("mysql:host=localhost;dbname=frolov_a", "frolov_a", "e7KI13");
        $sql= 'SET CHARACTER SET utf8';
        $res = $db->query($sql);
        // echo $airport_id_dep;echo '<br>';
        // echo $airport_id_dep_arri;echo '<br>';
        // echo $kogda;echo '<br>';

        $sql = "SELECT * FROM passengers WHERE passengers.Email = '".$email."'";
        $res = $db->query($sql);
        $result = $res->FETCHALL(PDO::FETCH_ASSOC);

        // echo $flight_id;
        // echo '<br>';

        if(count($result) != 0){
            // echo $result[0]["Name"].' '.$result[0]["patronymic"].' '.$result[0]["surname"], $email, "$flight_number", "$otkyda", $kyda, $departure_time, $plate, $flight_id;
            // echo "1";
                $sql = "INSERT INTO ticket (
                    number_of_ticket, 
                    booking_date, 
                    price, 
                    place_number, 
                    passenger_id, 
                    flight_id) 
                VALUES (
                    NULL, 
                    '".date("Y-m-d H:i:s")."', 
                    (SELECT flight.price FROM flight WHERE flight.flight_id = ".$flight_id."), 
                    ".$plate.",
                    (SELECT passengers.passenger_id FROM passengers WHERE passengers.Email = '".$email."'),
                    ".$flight_id.");";
                $db->query($sql);
                // echo "2";
                $ticket = new FlightTicket($result[0]["Name"].' '.$result[0]["patronymic"].' '.$result[0]["surname"], $email, "$flight_number", "$otkyda", $kyda, $departure_time, $plate);
                $ticket->printTicket();


            // echo $email;
            // echo '<br>';
            // echo $plate;
            // echo '<br>';
            // echo $flight_id;
            // echo '<br>';
        }else{
            echo 'В начале зарегистрируйтесь';
            echo '<br>';
            echo '<a class="floating-button" href="http://localhost:9999/frolov_a/Web/kursath/Sky/Login/login.php" smooth style="font-size: 20px; text-decoration: none; float: right; border-radius: 100px;">
                        <img src="http://localhost:9999/frolov_a/Web/kursath/Sky/pict/user_icon.png" width="40" height="40" style="margin: 5 0 5 0; " alt="" >
                </a>';
        }


    ?>
    <script>

    </script>
</body>
</html>