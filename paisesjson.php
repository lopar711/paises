<?php 

include("class/pais.php");
header('Access-Control-Allow-Origin: *');
$method = $_SERVER['REQUEST_METHOD'];
/*
echo "POR GET:";
echo "<pre>".print_r($_GET, true)."</pre>";
echo "<br>";
echo "<br>";
echo "POR POST:";
echo "<pre>".print_r($_POST, true)."</pre>";

*/
$inputJSON = file_get_contents("php://input");

$dataPais =json_decode($inputJSON, true);
//var_dump($dataPais);

$pais = new Pais();
//var_dump($pais->getDatosPais($dataPais));
echo json_encode($pais->getDatosPais($dataPais), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);


