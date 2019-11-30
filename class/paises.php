<?php
require("consulta.php");

class Paises{

       public function getPais($params = []){

        $parametrosConsulta = [
            "tabla"=>"country",
            "campos"=>["name","capital","code2", "code"],
            "where"=>$params,
            "limit"=>1

        ];

            $consulta = new Consulta();
            $consulta->_select($parametrosConsulta);
            return $consulta->respuesta;
            
            
       }

       public function getPaises($params = []){

        $parametrosConsulta = [
            "tabla"=>"country",
            "campos"=>["name","capital","code2", "code"],
            "where"=>$params,
            //"limit"=>1

        ];

            $consulta = new Consulta();
            $consulta->_select($parametrosConsulta);
            return $consulta->respuesta;
            
       }


       public function getCapital($params = []){
        $parametrosConsulta = [
            "tabla"=>"city",
            "campos"=>["name","district","info", "id"],
            "where"=>$params,
            "limit"=>1

        ];

            $consulta = new Consulta();
            $consulta->_select($parametrosConsulta);
            return $consulta->respuesta;
       }

       public function getCiudades($params = []){
        $parametrosConsulta = [
            "tabla"=>"city",
            "campos"=>["name","district","info", "id"],
            "where"=>$params,
            //"limit"=>1

        ];

            $consulta = new Consulta();
            $consulta->_select($parametrosConsulta);
            return $consulta->respuesta;
       }
     

}
/*
$parametros = [
        "name"=>"Mexico",
        "code"=>"MEX",
        "code2"=>"MX",
];

*/





