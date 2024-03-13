<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Списки</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/vue.js"></script>
    <script src='axios/dist/axios.min.js'></script>
    <meta charset="utf-8">
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #374b82;
            margin: 0;
        } */

        /* .nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
            background-color: #23345f;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
        } */

        /* .nav a {
            color: #ffffff;
            font-size: 20px;
            text-decoration: none;
            margin-right: 20px;
        } */

        /* .Color-text-1 {
            background-color: #374b82;
            color: #ffffff;
            padding: 80px 0;
            text-align: center;
        } */

        h1 {
            font-size: 36px;
            margin: 0;
        }

        .frame2 {
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        select {
            width: 100%;
            font-size: 18px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #cccccc;
        }

        th {
            background-color: #23345f;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="navs">
        <a class="floating-button" href="http://localhost:9999/frolov_a/Web/kursath/Sky/" smooth style="font-size: 20px; text-decoration: none;">
            Главная
        </a>
    </div><br><br><br><br>
    <div class="Color-text-1">
        <h1 class="text-uppercase">Сведения о рейсах</h1>
    </div>
    <div class="frame2">
        <div id='myapp'>
            <p>Найдено бортов: {{ users.length }} </p>
            <!-- List All records -->
            <select v-on:change="GetSelect()" size="8" v-model="name">
                <option disabled>Выберите борт</option>
                <option v-for='user in users' v-bind:value="user.airplane_id">{{ user.name }}</option>
            </select>
            <p><span>Выбрано: {{ name }} </span></p>
            <table v-if="results.result1.length">
                <thead>
                    <tr>
                        <th>рейс</th>
                        <th>время вылета</th>
                        <th>город вылета</th>
                        <th>время посадки</th>
                        <th>город посадки</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(n, i) in results.result1.length">
                        <td>{{ results.result1[i].flight_number }}</td>
                        <td>{{ results.result1[i].departure_time }}</td>
                        <td>{{ results.result1[i].location }}</td>
                        <td>{{ results.result2[i].arrival_time }}</td>
                        <td>{{ results.result2[i].location }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Script -->
        <script>
            var app = new Vue({
                el: '#myapp',
                data: {
                    users: "",
                    results: {result1: [], result2: []},
                    name: '',
                },

                computed: {
                },
                methods: {
                    ListRecords: function(){
                        axios.get('data_for_select.php').then(function (response) {
                            app.users = response.data;
                        }).catch(function (error) {
                            console.log(error);
                        });
                    },
                    GetSelect: function(){
                        let formData = new FormData();
                        formData.append('name', this.name)
                        axios({
                            method: 'post',
                            url: 'getdata_my.php',
                            data: formData,
                            config: { headers: {'Content-Type': 'multipart/form-data' }}
                        })
                            .then(function (response) {
                            console.log(response.data);
                            console.log(response);
                            app.results = response.data;
                            console.log(app.results);
                        }).catch(function (error) {
                            console.log(error);
                        });
                    },

                }
            })
            app.ListRecords();
        </script>
    </div>
</body>
</html>
