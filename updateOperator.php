<?php
session_start();
$_SESSION["id"] = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">


    <title>operatorUpdate</title>
</head>
<body>
 
<header>
    <a href="index.php">Журнал вызовов</a>
    <a href="users.php">Пользователи</a>
    <a href="operators.php">Операторы</a>
    <a href="statistic.php">Статистика</a>
</header>

   
<h1>Обновление оператора</h1>

<?php

require "config/config.php";
require "action/operatorChange.php";

$operator = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT * FROM `operators` 
         WHERE id = '{$_SESSION["id"]}'"));




?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <p>Оператор</p>
    <input type="text" name="operator" value="<?=$operator[0][1] ?>" required>
    <?php echo $err['operatorCheck']; ?>
    <input type="text" name="oldoperator" value="<?=$operator[0][1] ?>" hidden>

    <p>стоимость минуты звонка<br> внутри сети</p>
    <input type="number" name="priceown" value="<?=$operator[0][2] ?>" required>
         
    <p>стоимость минуты звонка<br> другим операторам</p>
    <input type="number" name="priseother" value="<?=$operator[0][3] ?>" required>           


    <button type="submit">Обновить</button> 


</form>

</div> 
</body>
</html>



