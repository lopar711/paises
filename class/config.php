<?php
set_error_handler('Config::exception_error_handler');
class Config{
    protected static $user = "root";
    protected static $pass = "";
    protected static $host = "mysql:host=localhost;dbname=world_x";

    public static function getConfig(){
        return array('user'=>self::$user, 'pass'=>self::$pass, "host"=> self::$host);
    }
    public static function exception_error_handler($severidad, $mensaje, $fichero, $linea) {
        $msjTemplate = "<small><strong><i>Ocurrio un error :</small></strong></i>"."<br />".
                       "Error : "."<b>".$mensaje."</b>"."<br />".
                       "Documento : "."<b style='color:blue'>".$fichero."</b>"."<br />".
                       "Linea : "."<b style='color:red'>".$linea."</b>"."<br />";
        if (!(error_reporting() & $severidad)) {
            // Este código de error no está incluido en error_reporting
            return;
        }
        throw new ErrorException($msjTemplate, 0, $severidad, $fichero, $linea);
    }


    
}