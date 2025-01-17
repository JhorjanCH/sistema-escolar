<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

include ('../../../app/config.php');

$id_pago = $_POST['id_pago'];

$sentencia = $pdo->prepare("DELETE FROM pagos WHERE id_pago=:id_pago");

$sentencia->bindParam('id_pago', $id_pago);

   
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se ha eliminado correctamente";
    $_SESSION['icono'] = "success";
    ?><script>window.history.back();</script><?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se logro eliminar 'Comuniquese con el 'ADMINISTRADOR' ";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}
   


