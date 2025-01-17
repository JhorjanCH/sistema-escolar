<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

include ('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];

$sentencia = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");

$sentencia->bindParam('id_usuario', $id_usuario);

   
try {

    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se ha eliminado correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/usuarios");
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se logro eliminar 'Comuniquese con el 'ADMINISTRADOR' ";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/usuarios");
    }
} catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = "Error no se logro eliminar porque el registro esta en otras tablas";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/usuarios");
}
   
