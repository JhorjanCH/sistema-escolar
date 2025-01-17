<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

include ('../../../app/config.php');

$id_asignacion = $_POST['id_asignacion'];

$sentencia = $pdo->prepare("DELETE FROM asignaciones WHERE id_asignacion=:id_asignacion");

$sentencia->bindParam('id_asignacion', $id_asignacion);

   
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se ha eliminado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/docentes/asignacion.php");
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se logro eliminar 'Comuniquese con el 'ADMINISTRADOR' ";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/docentes/asignaciones.php");
}