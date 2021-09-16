<?php 

class Modelo {
    static public function RutasModelo($rutas){
        if ($rutas == "ingreso" || 
        $rutas == "registrar" || 
        $rutas ==  "empleados" ||
        $rutas == "editar"  || 
        $rutas == "salir" ) {
            $pagina = "./vistas/modulos/".$rutas.".php";
        }  else if ($rutas == "index") {
            $pagina = "./vistas/modulos/ingreso.php";
        } else {
            $pagina = "./vistas/modulos/ingreso.php";
        }
        return $pagina;
    }
} 


?>