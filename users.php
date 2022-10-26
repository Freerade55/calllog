
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">


    <title>users</title>
</head>
<body>

<header>
    <a href="index.php">Журнал вызовов</a>
    <a href="users.php">Пользователи</a>
    <a href="operators.php">Операторы</a>
    <a href="statistic.php">Статистика</a>
</header>

    
<h1>Пользователи</h1>


<div class="table-main">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Пользователь</th>
                <th scope="col">Номер</th>
                <th scope="col">Обновление номера</th>
              

            </tr>
        </thead>
        <tbody>
        <?php

      

            require "config/config.php";
            require "action/addUser.php";
          
            $users =  mysqli_fetch_all(mysqli_query(connectBd::connect(),
                "SELECT users.id, users.name, t_numbers.t_number
            FROM `users` INNER JOIN `t_numbers` ON users.number_id = t_numbers.id"));
            
            for($i=0; $i < count($users); $i++) { ?>

                <tr>
                    <td><?=$users[$i][1] ?></td>
                    <td><?=$users[$i][2] ?></td>             
                   
                    <td><a href="updateUser.php?id=<?=$users[$i][0] ?>" class="update">Обновить</a></td>

                </tr>

            <?php } ?>
            
        </tbody>
    </table>


    
<h2>Добавить пользователя</h2>




<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">



    
    <p>Пользователь</p>
    <input type="text" name="user" required> 
    <?php echo $err['user'];?>
    <?php echo $err['userCheck'];?>
  

    <p>Номер</p>

    <select name="number">
        <option value="-">-</option> 
                <?php

            $freeNumbers = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT id, t_number FROM `t_numbers` 
            WHERE id NOT IN (SELECT number_id FROM users)"));

            for($i=0; $i < count($freeNumbers); $i++) { ?>

                <option value="<?= $freeNumbers[$i][0]?>"><?= $freeNumbers[$i][1]?></option> 


        <?php } ?>


    </select>
    <?php echo $err['number'] ?>

    <button type="submit">Добавить</button> 


</form>

</div> 
</body>
</html>



