<?php

require("base.php");

class Consulta{
    private $linkPDO;
    public $sql = null;
    public $respuesta = null;
    public $enviados = [];

    public function __construct($sql = null){
        if($sql > null):
            $this->sql = $sql;
        endif;
        
    }

    public function _select($params = []){

        $this->linkPDO = Base::conectar();

        $cadenaWhere = "WHERE ";
        $cadenaCampos = "*";
        $limit = "";
        $tabla = $params['tabla'];
        $valores = [];
        if(isset($params['limit'])):
            $limit = "LIMIT ".$params['limit'];
        endif;
        if(is_array($params['campos'])):
            $cadenaCampos ="";
            foreach($params['campos'] as $dato => $valor):
                $cadenaCampos .= $valor.",";
            endforeach;
        endif;  
        
        if(isset($params['where'])):
            foreach($params['where'] as $dato => $valor):
                $cadenaWhere .= $dato."="."?"." AND ";
                $valores[$dato] = $valor;
            endforeach;
        endif;

        $cadenaWhere =  substr($cadenaWhere, 0, -5);
        $cadenaCampos =  substr($cadenaCampos, 0, -1);
        $this->enviados = $valores;

        $consultaSQL = "SELECT ".$cadenaCampos." FROM ".$tabla." ".$cadenaWhere." ".$limit;
        $this->sql = $consultaSQL;
        try{
            $consultaPDO = $this->linkPDO->prepare($consultaSQL);
            $consultaPDO->execute(array_values($valores));
            if(isset($params['limit']) AND $params['limit'] == 1):
                $resultado = $consultaPDO->fetch(PDO::FETCH_ASSOC);
            else:
                $resultado = $consultaPDO->fetchAll(PDO::FETCH_ASSOC);
            endif;
            
            $this->respuesta = $resultado;

        }catch(PDOException $e){
            return $e->get<message();
        }
        
        $this->linkPDO = Base::desconectar();
    }

}