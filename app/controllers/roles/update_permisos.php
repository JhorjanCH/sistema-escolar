<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../../../app/config.php');

$id_permiso = $_POST['id_permiso'];
$nombre_url = $_POST['nombre_url'];
$url = $_POST['url'];


$sentencia = $pdo->prepare('UPDATE permisos
    SET nombre_url=:nombre_url,
        url=:url,
        fyh_actualizacion=:fyh_actualizacion
    WHERE id_permiso=:id_permiso');

$sentencia->bindParam(':nombre_url',$nombre_url);
$sentencia->bindParam(':url',$url);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_permiso',$id_permiso);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se actualizó permiso correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."admin/roles/permisos.php");
}else{
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se logro registras 'Comuniquese con el 'ADMINISTRADOR' ";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}