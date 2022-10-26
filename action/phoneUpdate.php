<?php



function clear_data($val){
    $val = trim($val);
    $val = stripslashes($val);
    $val = strip_tags($val);
    $val = htmlspecialchars($val);
    return $val;
}

$oldNumber = $_POST['oldnumb'];
$phone = clear_data($_POST['number']);



$pattern_phone = '/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/';

$err = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){


    if (!preg_match($pattern_phone, $phone)){
        $err['number'] = '<br>'.'<small style = "color: red;">Неверный формат</small>';
        
    } else {

    $numberCheck = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT `t_number` FROM `t_numbers` 
    WHERE `t_number` = '$phone'"));   

    if($phone == $oldNumber) {

    $updateNumber = mysqli_query(connectBd::connect(), "UPDATE `t_numbers` SET `t_number` = '$phone' WHERE `t_number` = '$oldNumber'");
    header('Location: users.php');
    }
    elseif(!empty($numberCheck)) {
        $err['numberCheck'] = '<br>'.'<small style = "color: red;">Такой номер уже есть</small>';
     

    }
    else{

    $updateNumber = mysqli_query(connectBd::connect(), "UPDATE `t_numbers` SET `t_number` = '$phone' WHERE `t_number` = '$oldNumber'");
    header('Location: users.php');




    }







    }

 }












?>