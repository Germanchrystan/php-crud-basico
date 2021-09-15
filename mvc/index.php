<?php 
require_once "./controladores/rutasC.php";
require_once "./modelos/rutasM.php";


$rutas = new RutasControlador();
$rutas -> Plantilla();

?>