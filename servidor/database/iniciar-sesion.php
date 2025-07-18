<?php

if($_POST){
    include "conexion.php";
    date_default_timezone_set('America/Matamoros');

    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $fecha = date("Y-m-d");


    $datos = array(
        $username, $pass
    );

    $consultar = $con->prepare("SELECT COUNT(*) FROM usuarios WHERE usuario  = ?");
    $consultar->execute([$username]);
    $total = $consultar->fetchColumn();
    $consultar->closeCursor();

    if($total > 0){
        	
        $consultar = $con->prepare("SELECT * FROM usuarios WHERE usuario  = ?");
        $consultar->execute([$username]);
        while ($row = $consultar->fetch()) {

            if($row['estatus'] == 1){

                $hash = $row['contraseña'];

                if(password_verify($pass, $hash)){
                    
                    session_start();
                    
                    $_SESSION["id"] = $row['id'];
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['apellido'] = $row['apellido'];
                    $_SESSION['user'] = $row['usuario'];
                    $_SESSION['fecha_ingreso'] = $row['fecha_ingreso'];
                    $_SESSION['rol'] = $row['rol'];
                    $_SESSION['estatus'] = $row['estatus'];

                   /*  $consultasr = $con->prepare("SELECT * FROM sucursal WHERE id  = ?");
                    $consultasr->execute([$row['sucursal_id']]);
                    while ($rowx = $consultasr->fetch()) {
                        $_SESSION["sucursal_name"] = $rowx['name'];
                    } */

                    $estatus =1;
                    $rol = $row['rol'];
                }else{
                    $estatus = 3;
                    $rol = null;
                    $sucursal = null;
                    $proyecto = null;
                }
            }else{
                $estatus = 4;
                $rol = null;
                $sucursal = null;
                $proyecto = null;

            }
            
        }
        

    }else{
        $estatus = 2;
        $rol = null;

    }

    $response = array("estado"=> $estatus, "rol"=> $rol);
    echo json_encode($response, JSON_UNESCAPED_UNICODE);


};

?>