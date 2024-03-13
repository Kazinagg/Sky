<!DOCTYPE html>
<html lang="ru">
<link rel="stylesheet" type="text/css" href="css/style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Города</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #23345f;
            color: #ffffff;
            /* display: flex; */
            /* justify-content: center; */
            /* align-items: center; */
            /* min-height: 100vh; */
        }

        .bad{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            width: 100%;
            padding: 20px;
            background-color: #374b82;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 65px;
        }

        h2 {
            font-size: 24px;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .airport-info {
            font-size: 18px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .airport-info p {
            margin: 0;
        }

        .airport-name {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div Class="navs" >
        <a class="floating-button" href="http://localhost:9999/frolov_a/Web/kursath/Sky/" smooth style="font-size: 20px; text-decoration: none;">
            Главная
        </a>
    </div>
    <br><br><br>
    <div class="Color-text-1" style="padding-top: 80;" align="center"> 
        <h1 class="text-uppercase">Сведения о городах</h1>
    </div>
    <div class="bad">
    <div class="container">
        <?php
        $db = new PDO("mysql:host=localhost;dbname=frolov_a", "frolov_a", "e7KI13");
        $sql= 'SET CHARACTER SET utf8';
        $res = $db->query($sql);

        $sql = "SELECT * FROM airport";
        $res = $db->query($sql);

        $airport = $res->FetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php foreach ($airport as $news_item): ?>
            <h2><?php echo $news_item['airport_id'] ?></h2>
            <div class="airport-info">
                <p class="airport-name">Аэропорт: <?php echo $news_item['airport_name'] ?></p>
                <p>Город: <?php echo $news_item['location'] ?></p>
            </div>
        <?php endforeach ?>
    </div>
    </div>

</body>
</html>
