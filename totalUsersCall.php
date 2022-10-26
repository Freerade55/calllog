
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">


    <title>totalUsersCall</title>
</head>
<body>
    


<header>
    <a href="index.php">Журнал вызовов</a>
    <a href="users.php">Пользователи</a>
    <a href="operators.php">Операторы</a>
    <a href="statistic.php">Статистика</a>
</header>




<h1>Статистика</h1>


<div class="table-main">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Пользователь</th>
                <th scope="col">Общая длительность разговоров</th>
            </tr>
        </thead>
        <tbody>
        <?php

            require "config/config.php";




          
            $stat = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT user, SUM(duration) as totalDuration FROM `calls` GROUP BY user
            "));


      
            for($i=0; $i < count($stat); $i++) { ?>

                <tr>
                    <td><?=$stat[$i][0] ?></td>
                    <td><?=$stat[$i][1]." секунд" ?></td>
             

                </tr>

            <?php } ?>

        </tbody>
    </table>

</div> 



</body>
</html>