<?php






function clear_data($val){
    $val = trim($val);
    $val = stripslashes($val);
    $val = strip_tags($val);
    $val = htmlspecialchars($val);
    return $val;
}


$name = clear_data($_POST['user']);
$phone = clear_data($_POST['number']);


$pattern_name = '/^.[А-ЯЁ][а-яё].*$/';

$err = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){


    if (!preg_match($pattern_name, $name)){
        $err['user'] = '<br>'.'<small style = "color: red;">Тут только русские буквы</small>';
        
    }
    elseif (mb_strlen($name) > 30){
        $err['user'] = '<br>'.'<small style = "color: red;">Имя должно быть не больше 30 символов</small>';
    }  
    
    elseif($phone == '-') {
        $err['number'] = '<br>'.'<small style = "color: red;">Поля не должны быть пустыми</small>';


        } else {

        $userCheck = mysqli_fetch_all(mysqli_query(connectBd::connect(), "SELECT `name` FROM `users` 
        WHERE `name` = '$name'"));

        if(!empty($userCheck)) {
            $err['userCheck'] = '<br>'.'<small style = "color: red;">Такой пользователь уже есть</small>';
        }else{

            $insertUser = mysqli_query(connectBd::connect(), "INSERT INTO users (`name`, `number_id`)
            VALUES ('$name', $phone)");

            if(!$run) {
                printf(mysqli_error(connectBd::connect()));
            }else{
                header('Location: users.php');
            }

        
            
        }

    

    }

 }













?>