<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

include ('../../../app/config.php');

$id_rol = $_POST['id_rol'];

$sentencia = $pdo->prepare("DELETE FROM roles WHERE id_rol=:id_rol");
$sentencia->bindParam('id_rol', $id_rol);

try {
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
} catch (Exception $exeption) {
    session_start();
        $_SESSION['mensaje'] = "Error no se logro eliminar porque el registro existe en otras tablas";
        $_SESSION['icono'] = "error";
        header('Location:'.APP_URL."/admin/roles");
}




