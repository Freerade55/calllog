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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">


    <title>userUpdate</title>
</head>
<body>

<header>
    <a href="index.php">Журнал вызовов</a>
    <a href="users.php">Пользователи</a>
    <a href="operators.php">Операторы</a>
    <a href="statistic.php">Статистика</a>
</header>

  
<h1>Обновление номера</h1>

<?php

require "config/config.php";
require "action/phoneUpdate.php";

$user = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT users.name, t_numbers.t_number
    FROM `users` INNER JOIN `t_numbers` ON users.number_id = t_numbers.id
    WHERE users.id = '{$_SESSION["id"]}'"));






?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <p>Пользователь</p>
    <input type="text" name="user" value="<?=$user[0][0] ?>" readonly> 


    <input type="tel" name="oldnumb" value="<?=$user[0][1]?>" hidden> 

    <p>Номер</p>
    <input type="tel" name="number" value="<?=$user[0][1] ?>"> 
    <?php echo $err['number'] ?>
    <?php echo $err['numberCheck'] ?>
    

    <button type="submit">Обновить</button> 


</form>

</div> 
</body>
</html>



