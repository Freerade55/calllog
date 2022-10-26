
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">


    <title>operators</title>
</head>
<body>
    




<header>
    <a href="index.php">Журнал вызовов</a>
    <a href="users.php">Пользователи</a>
    <a href="operators.php">Операторы</a>
    <a href="statistic.php">Статистика</a>
</header>


<h1>Операторы</h1>


<div class="table-main">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">оператор</th>
                <th scope="col">стоимость минуты звонка внутри сети</th>
                <th scope="col">стоимость минуты звонка другим операторам</th>
                <th scope="col">Обновление оператора</th>


            </tr>
        </thead>
        <tbody>
        <?php

      


            require "config/config.php";
            require "action/addOperator.php";
          
            $operators =  mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT * FROM `operators`"));
            
            for($i=0; $i < count($operators); $i++) { ?>

                <tr>
                    <td><?=$operators[$i][1] ?></td>
                    <td><?=$operators[$i][2] ?></td>
                    <td><?=$operators[$i][3] ?></td>
             
                   
                    <td><a href="updateOperator.php?id=<?=$operators[$i][0] ?>" class="update">Обновить</a></td>

                </tr>

            <?php } ?>
            
        </tbody>
    </table>


     
<h2>Добавить оператора</h2>




<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">



    
    <p>оператор</p>
    <input type="text" name="operator" required>

    <?php echo $err['operatorCheck']; ?>

        
    <p>стоимость минуты звонка<br> внутри сети</p>
    <input type="number" name="priceown" required>
         
    <p>стоимость минуты звонка<br> другим операторам</p>
    <input type="number" name="priseother" required>           


    <button type="submit">Добавить</button> 


</form>

</form>

</div> 
</body>
</html>



