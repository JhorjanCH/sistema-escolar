<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

include ('../../../app/config.php');

$id_permiso = $_POST['id_permiso'];

$sentencia = $pdo->prepare("DELETE FROM permisos WHERE id_permiso=:id_permiso");

$sentencia->bindParam('id_permiso', $id_permiso);

try {
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se ha eliminado correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/roles/permisos.php");
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se logro eliminar 'Comuniquese con el 'ADMINISTRADOR' ";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/permisos.php");
    }
} catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = "Error no se logro eliminar porque el registro existe en otras tablas";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles/permisos.php");
}
   
