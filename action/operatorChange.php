
<?php



function clear_data($val){
    $val = trim($val);
    $val = stripslashes($val);
    $val = strip_tags($val);
    $val = htmlspecialchars($val);
    return $val;
}

$operator = clear_data($_POST['operator']);
$oldOperator = $_POST['oldoperator'];
$priceown = $_POST['priceown'];
$priseother = $_POST['priseother'];




$err = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){


    $operatorCheck = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT `name` FROM `operators` 
    WHERE `name` = '$operator'"));   
    if($operator == $oldOperator) {

    $updateNumber = mysqli_query(connectBd::connect(), "UPDATE `operators` SET `name` = '$operator', `minute_call` = $priceown, 
    `minute_call_other` = '$priseother' WHERE `name` = '$oldOperator'");
    header('Location: operators.php');
    
    }
    elseif(!empty($operatorCheck)) {
        $err['operatorCheck'] = '<br>'.'<small style = "color: red;">Такой оператор уже есть</small>';
    }else{

    $updateNumber = mysqli_query(connectBd::connect(), "UPDATE `operators` SET `name` = '$operator', `minute_call` = $priceown, 
    `minute_call_other` = '$priseother' WHERE `name` = '$oldOperator'");
    header('Location: operators.php');



    }







    };

 




?>