<?php 

header('Access-Control-Allow-Origin: *');
$method = $_SERVER['REQUEST_METHOD'];

echo "POR GET:";
echo "<pre>".print_r($_GET, true)."</pre>";
echo "<br>";
echo "<br>";
echo "POR POST:";
echo "<pre>".print_r($_POST, true)."</pre>";





