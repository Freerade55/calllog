<?php







$whoCall = $_POST['whoCall'];
$callTo = $_POST['callto'];
$callStart = $_POST['callStart'];
$callFinish = $_POST['callFinish'];
$callDuration = $_POST['callDuration'];

$err = [];
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if($whoCall == '-' || $callTo == '-') {
        $err['name'] = '<br>'.'<small style = "color: red;">Поля не должны быть пустыми</small>';
        }elseif($whoCall == $callTo) {
            $err['name'] = '<br>'.'<small style = "color: red;">Пользователь не может себе позвонить</small>';

        }else{
       

        
$whoCallNumber = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT `number_id` FROM `users` WHERE `name` = '$whoCall'"));
$callToNumber = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT `number_id` FROM `users` WHERE `name` = '$callTo'"));


$whoCallNumber = $whoCallNumber[0][0];
$callToNumber = $callToNumber[0][0];

$whoCallOperator = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT `name`, `minute_call`, 
`minute_call_other` FROM `operators` INNER JOIN `t_numbers` ON t_numbers.operator_id = operators.id
WHERE t_numbers.id = '$whoCallNumber'"));


$callToOperator = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT `name`, `minute_call`, 
`minute_call_other` FROM `operators` INNER JOIN `t_numbers` ON t_numbers.operator_id = operators.id
WHERE t_numbers.id = '$callToNumber'"));

$price = 0;

if($whoCallOperator[0][0] != $callToOperator[0][0]) {

    if($callDuration < 60) {
        $price = $whoCallOperator[0][2];
    } else {
        $price = ceil(($callDuration / 60)) * $whoCallOperator[0][2];
    }
} else {
    
    if($callDuration < 60) {
        $price = $whoCallOperator[0][1];
    } else {
        $price = ceil(($callDuration / 60)) * $whoCallOperator[0][1];
    }
}

$run = mysqli_query(connectBd::connect(), "INSERT INTO calls (`user`, `user_call`, `call_start`, `call_finish`, `duration`, `price`)
VALUES ('$whoCall', '$callTo', '$callStart', '$callFinish', $callDuration, $price)");





        }
        
}







?>