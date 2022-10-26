
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">


    <title>Statistic</title>
</head>
<body>
    


<header>
    <a href="index.php">Журнал вызовов</a>
    <a href="users.php">Пользователи</a>
    <a href="operators.php">Операторы</a>
    <a href="statistic.php">Статистика</a>
</header>



<h2>Общая длительность разговоров по каждому пользователю</h2>

<form action="totalUsersCall.php" method="post">
    
    <button type="submit">Посмотреть</button> 


</form>

<div class="line"></div>




<h2>Количество средств, потраченных на звонки пользователем</h2>

<form action="callCost.php" method="post">
    
    <p>Пользователь</p>

    <select name="user">
        <option value="-">-</option> 
                <?php

            require "config/config.php";

            $user = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT `name` FROM `users`"));

            for($i=0; $i < count($user); $i++) { ?>

                <option value="<?= $user[$i][0]?>"><?= $user[$i][0]?></option> 


        <?php } ?>


    </select>


    <p>Время начала звонка</p>
    <input type="datetime-local" name="callStart" required>    
    <p>Время завершения звонка</p>
    <input type="datetime-local" name="callFinish" required>   

    <button type="submit">Посмотреть</button> 


</form>

</body>
</html>