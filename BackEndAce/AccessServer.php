<?php

include("GestionBDD.php");

try {

$serv = new SoapServer(null, array('uri' => 'http://localhost/ConvertisseurDallardServeur/AccessServer.php'));
$serv->setClass("ConvertFunctions");
$serv->handle();

} catch (Exception $e) {
  echo $e;
}

?>
