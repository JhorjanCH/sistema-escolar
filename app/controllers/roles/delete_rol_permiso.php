<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

include ('../../../app/config.php');

$id_rol_permiso = $_POST['id_rol_permiso'];

$sentencia = $pdo->prepare("DELETE FROM roles_permisos WHERE id_rol_permiso=:id_rol_permiso");

$sentencia->bindParam('id_rol_permiso', $id_rol_permiso);

   
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se ha eliminado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/roles");
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se logro eliminar 'Comuniquese con el 'ADMINISTRADOR' ";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/roles");
}