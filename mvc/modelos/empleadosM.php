<?php 

require_once "conexionBD.php";

class EmpleadosM extends conexionBD {

    //Registrar Empleados
    static public function RegistrarEmpleadosM($datosC, $tablaBD){

        $pdo = conexionBD::cBD()->prepare(
            "INSERT INTO $tablaBD 
            (nombre, apellido, email, puesto, salario) 
            VALUES (:nombre, :apellido, :email, :puesto, :salario)"
            );
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo -> bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
        $pdo -> bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);
        
        if($pdo -> execute()){
            return "OK";
        } else {
            return "Error";
        }
        $pdo -> close();
    }

    //Mostrar empleados
    static public function MostrarEmpleadosM($tablaBD){
        $pdo = conexionBD::cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaBD");
        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo -> close();
    }
}


?>