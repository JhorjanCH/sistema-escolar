<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

include ('../../../app/config.php');

$id_kardex = $_POST['id_kardex'];

$sentencia = $pdo->prepare("DELETE FROM kardexs WHERE id_kardex=:id_kardex");

$sentencia->bindParam('id_kardex', $id_kardex);

   
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se ha eliminado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/kardex");
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se logro eliminar 'Comuniquese con el 'ADMINISTRADOR' ";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/kardex");
}