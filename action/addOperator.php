<?php






function clear_data($val){
    $val = trim($val);
    $val = stripslashes($val);
    $val = strip_tags($val);
    $val = htmlspecialchars($val);
    return $val;
}


$operator = clear_data($_POST['operator']);
$priceown = $_POST['priceown'];
$priseother = $_POST['priseother'];



$err = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){


    $operatorCheck = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT `name` FROM `operators` 
    WHERE `name` = '$operator'"));

        if(!empty($operatorCheck)) {
            $err['operatorCheck'] = '<br>'.'<small style = "color: red;">Такой оператор уже есть</small>';
        }else{

            $insertOperator = mysqli_query(connectBd::connect(), "INSERT INTO operators (`name`, `minute_call`, `minute_call_other`)
            VALUES ('$operator', $priceown, $priseother)");

            if(!$run) {
                printf(mysqli_error(connectBd::connect()));
            }else{
                header('Location: operators.php');
            }

            
        }

  


    

 }













?>