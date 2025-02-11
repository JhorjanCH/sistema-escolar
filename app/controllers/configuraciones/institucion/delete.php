<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

include ('../../../../app/config.php');

$id_config_institucion = $_POST['id_config_institucion'];

$sentencia = $pdo->prepare("DELETE FROM configuracion_instituciones WHERE id_config_institucion=:id_config_institucion");

$sentencia->bindParam('id_config_institucion', $id_config_institucion);

try {
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se ha eliminado correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/configuraciones/institucion");
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se logro eliminar 'Comuniquese con el 'ADMINISTRADOR' ";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
    }
} catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = "Error no se logro eliminar porque el registro existe en otras tablas";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
}
   

   
