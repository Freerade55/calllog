<?php 





class connectBd
{

    const HOSTNAME = '';
    const USERNAME = '';
    const PASSWORD = '';
    const DATABASE = '';


    public static function connect()
    {

        if (!mysqli_connect(self::HOSTNAME, self::USERNAME, self::PASSWORD,
            self::DATABASE)) {
            return die('ошибка подключения к базе данных');
        }else{
            $mysqli = mysqli_connect(self::HOSTNAME, self::USERNAME, self::PASSWORD,
                self::DATABASE);
            mysqli_set_charset($mysqli, "utf8");
           return $mysqli;
        }
    }

}
?>
