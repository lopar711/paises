<?php
require("paises.php");

class Pais extends Paises{

    public $nombre;
    public $codigo;
    public $capitalId;
    public $capital;
    public $codigo2;
    public $ciudadesPrincipales;

    public function __construct($params = []){
        try{
       $this->objPais =  parent::getPais($params);
       $this->nombre = $this->objPais['name'];
       $this->codigo = $this->objPais['code'];
       $this->capitalId = $this->objPais['capital'];
       $this->codigo2 = $this->objPais['code2'];
        }catch(Exception $e){
            echo $e->getMessage();
        }
       
    }
    public function getCapitalPais(){
        $arrayCapital = [
            "id"=>$this->capitalId
        ];
        $this->capital = parent::getCapital($arrayCapital);
    }

    public function getCiudadesPais(){
        $arrayCiudades = [
            "countrycode" => $this->codigo,
           ];
           $this->ciudadesPrincipales = parent::getCiudades($arrayCiudades);
    }

}

$datosPais = [
    "name"=>"Mexico",
    "code"=>"MEX",
    "code2"=>"MX",
];
$Mexico = new Pais($datosPais);
$Mexico->getCapitalPais();
$Mexico->getCiudadesPais();
var_dump($Mexico);
