<?php 
require("config.php");

class Base extends Config{

    public static $linkPDO = null;
    public static function conectar(){
        try{
            if(self::$linkPDO == null):
                self::$linkPDO = new PDO(parent::$host, parent::$user, parent::$pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            endif;
            return self::$linkPDO;
        }catch(PDOException $err){
            die($err->getMessage());
        }
    }

    public static function desconectar(){
        if(gettype(self::$linkPDO) !== null):
            self::$linkPDO = null;
        endif;
    }
  
}




