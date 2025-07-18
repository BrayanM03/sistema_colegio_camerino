<?php


if($_POST){

    include "../database/conexion.php";
    include "../helpers/response_helper.php";

    date_default_timezone_set('America/Matamoros');
    session_start();
    $id_profesor = $_POST['profesor'];
    $id_materia = $_POST['materia'];
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];
    $id_grupo = $_POST['grupo'];
    $id_usuario = $_SESSION['id'];

    $count = "SELECT count(*) FROM detalle_prehorario WHERE 
    (id_materia =? AND dia =? AND hora=? AND id_grupo=? AND id_usuario=? AND id_profesor=?) OR
    (dia = ? AND hora = ?)";
    $res = $con->prepare($count);
    $res->execute([$id_materia, $dia, $hora, $id_grupo, $id_usuario, $id_profesor, $dia, $hora]);
    $total_ordenes = $res->fetchColumn();
    $res->closeCursor(); 
    
    $nuevo_estatus = "Disponible";
    
    if($total_ordenes == 0){
    
        $insert = "INSERT INTO detalle_prehorario(id_materia, dia, hora, id_grupo, id_usuario, id_profesor) 
        VALUES(?,?,?,?,?,?)";
        $stmt = $con->prepare($insert);
        $stmt->execute([$id_materia, $dia, $hora, $id_grupo, $id_usuario, $id_profesor]);
        $stmt->closeCursor();

        responder(true, 'Registro insertado correctamente', [], true);
    }else{
        responder(false, 'No se puede repetir el registro o el día igual a la hora','success', [], true);
    }

}
?>