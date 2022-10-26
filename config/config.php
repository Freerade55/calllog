<?php 





class connectBd
{

    const HOSTNAME = 'localhost';
    const USERNAME = 'u1817486_root';
    const PASSWORD = 'HD123RUS';
    const DATABASE = 'u1817486_calllog';


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