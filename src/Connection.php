<?php
namespace App;

use PDO;

class Connection {

    public static function getPDO () : PDO
    {
        return new PDO('mysql:dbname=gp-challenges_com;host=myqphx16', 'gp-chall_com_dbo','bicNS53t',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        /*
         new PDO("mysql:dbname=reactBDD;host=localhost", 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);*/
    }
}
