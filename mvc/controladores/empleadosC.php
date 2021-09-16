<?php 

class EmpleadosC{
    // Registro de Empleados
    public function RegistrarEmpleadosC(){
        if(isset($_POST["nombreR"])){

            $datosC = array(
                "nombre" => $_POST["nombreR"],
                "apellido" => $_POST["apellidoR"],
                "email" => $_POST["emailR"],
                "puesto" => $_POST["puestoR"],
                "salario" => $_POST["salarioR"]
            );
    
            $tablaBD = "empleados";
    
            $respuesta = EmpleadosM::RegistrarEmpleadosM($datosC, $tablaBD);
            if($respuesta == "OK") {
                header("location:index.php?ruta=empleados");
            } else {
                echo "Error";
            }
        }
    }

    // Mostrar empleados
    public function MostrarEmpleadosC($tablaBD){
        $respuesta = EmpleadosM::MostrarEmpleadosM($tablaBD);

        foreach($respuesta as $key => $value){

            echo '<tr>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["apellido"].'</td>
            <td>'.$value["email"].'</td>
            <td>'.$value["puesto"].'</td>
            <td>$'.$value["salario"].'</td>
            <td><a href="index.php?ruta=editar&id='.$value["id"].'"><button>Editar</button></a></td>
            <td><button>Borrar</button></td>
            </tr>'; 
        }
    }
    // Editar empleados
    public function EditarEmpleadoC(){
        $datosC = $_GET["id"];
        $tablaBD = "empleados";

        $respuesta = EmpleadosM::EditarEmpleadoM($datosC, $tablaBD);

        echo '
        <input type="hidden" value="'.$respuesta["id"].'" name="idE">
        
        <input type="text" value="'.$respuesta["nombre"].'" placeholder="Nombre" name="nombreE" required>

		<input type="text" value="'.$respuesta["apellido"].'" placeholder="Apellido" name="apellidoE" required>

		<input type="email" value="'.$respuesta["email"].'" placeholder="Email" name="emailE" required>

		<input type="text" value="'.$respuesta["puesto"].'" placeholder="Puesto" name="puestoE" required>

		<input type="text" value="'.$respuesta["salario"].'" placeholder="Salario" name="salarioE" required>

		<input type="submit" value="Actualizar">';
    }

    //Actualizar Empleados
    public function ActualizarEmpleadoC(){
        if(isset($_POST["nombreE"])){
            $datosC = array(
                "id" => $_POST["idE"],
                "nombre" => $_POST["nombreE"],
                "apellido" => $_POST["apellidoE"],
                "email" => $_POST["emailE"],
                "puesto" => $_POST["puestoE"],
                "salario" => $_POST["salarioE"]
            );

            $tablaBD = "empleados";
            $respuesta = EMpleadosM::ActualizarEmpleadoM($datosC, $tablaBD);
            if($respuesta == "OK") {
                header("location:index.php?ruta=empleados");
            } else {
                echo "Error";
            }

            $pdo -> close();
        }
    }

}

?>