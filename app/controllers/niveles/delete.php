<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

include ('../../../app/config.php');

$id_nivel = $_POST['id_nivel'];

$sentencia = $pdo->prepare("DELETE FROM niveles WHERE id_nivel=:id_nivel");

$sentencia->bindParam('id_nivel', $id_nivel);

try {
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se ha eliminado correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/niveles");
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se logro eliminar 'Comuniquese con el 'ADMINISTRADOR' ";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
    }
} catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = "Error no se logro eliminar poruqe el registro existe en otras tablas";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
}   


   


