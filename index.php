

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">


    <title>CallLog</title>
</head>
<body>



<header>
    <a href="index.php">Журнал вызовов</a>
    <a href="users.php">Пользователи</a>
    <a href="operators.php">Операторы</a>
    <a href="statistic.php">Статистика</a>
</header>




<h1>Журнал вызовов</h1>


<div class="table-main">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Кто звонил</th>
                <th scope="col">Кому звонили</th>
                <th scope="col">Время начала звонка</th>
                <th scope="col">Время завершения звонка</th>
                <th scope="col">Продолжительность звонка</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Удаление</th>

            </tr>
        </thead>
        <tbody>
        <?php

        require "config/config.php";
        require "action/addNote.php";

            // в action просто скрипты без html

        $calls = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT * FROM calls"));
        




      
            for($i=0; $i < count($calls); $i++) { ?>

                <tr>
                    <td><?=$calls[$i][1] ?></td>
                    <td><?=$calls[$i][2] ?></td>
                    <td><?=$calls[$i][3] ?></td>
                    <td><?=$calls[$i][4] ?></td>
                    <td><?=$calls[$i][5]." секунд" ?></td>
                    <td><?=$calls[$i][6]." копеек" ?></td>
                    <td><a href="action/deleteNote.php?id=<?=$calls[$i][0] ?>">Удалить</a></td>

                </tr>

            <?php } ?>

        </tbody>
    </table>

</div> 


<h2>Добавить запись</h2>

<?php


$users = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT `name` FROM `users`"));

?>

<?php

for($i=0; $i < count($users); $i++) {

} ?>




<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <p>Кто звонил</p>

    <select name="whoCall">
        <option value="-">-</option> 
                <?php

            for($i=0; $i < count($users); $i++) { ?>

                <option value="<?= $users[$i][0]?>"><?= $users[$i][0]?></option> 


        <?php } ?>


    </select>

    <?php echo $err["name"]; ?>

    <?php
     ?>

    <p>Кому звонили	</p>

    <select name="callto">
        <option value="-">-</option> 
                <?php

            for($i=0; $i < count($users); $i++) { ?>

                <option value="<?= $users[$i][0]?>"><?= $users[$i][0]?></option> 


        <?php } ?>

    </select>
    <?php echo $err["name"]; ?>

    <?php
     ?>

    <p>Время начала звонка</p>
    <input type="datetime-local" name="callStart" required>    
    <p>Время завершения звонка</p>
    <input type="datetime-local" name="callFinish" required>    
    <p>Продолжительность звонка<br> в секундах</p>
    <input type="number" name="callDuration" required>

    <button type="submit">Добавить</button>           

</form>


</body>
</html>