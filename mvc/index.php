<?php 
require_once "./controladores/rutasC.php";
require_once "./controladores/adminC.php";
require_once "./controladores/empleadosC.php";

require_once "./modelos/rutasM.php";
require_once "./modelos/adminM.php";
require_once "./modelos/empleadosM.php";


$rutas = new RutasControlador();
$rutas -> Plantilla();

?>