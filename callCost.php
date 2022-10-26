
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">


    <title>allCost</title>
</head>
<body>
    
<?php 
$user = $_POST['user'];
$callStart = $_POST['callStart'];
$callFinish = $_POST['callFinish'];


?>

<header>
    <a href="index.php">Журнал вызовов</a>
    <a href="users.php">Пользователи</a>
    <a href="operators.php">Операторы</a>
    <a href="statistic.php">Статистика</a>
</header>




<h1>Статистика за <?= str_replace('T', ' ', $callStart);  ?> - <?= str_replace('T', ' ', $callFinish); ?></h1>

<?php

require_once "config/config.php";


$user =  mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT user, SUM(price) as price
FROM `calls` WHERE (call_start >= '$callStart' AND call_start <= '$callFinish') AND (user = '$user') GROUP BY user"));

?>



<div class="table-main">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Пользователь</th>
                <th scope="col">Потрачено на звонки</th>
            </tr>
        </thead>
        <tbody>
        <?php



    
        for($i=0; $i < count($user); $i++) { ?>

            <tr>
                <td><?=$user[$i][0] ?></td>
                <td><?=$user[$i][1]." копеек" ?></td>
            

            </tr>

        <?php } ?>

        </tbody>
    </table>

</div> 














</body>
</html>