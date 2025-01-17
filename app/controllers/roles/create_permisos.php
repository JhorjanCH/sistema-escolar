<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../../../app/config.php');

$nombre_url = $_POST['nombre_url'];
$url = $_POST['url'];


$sentencia = $pdo->prepare('INSERT INTO permisos
(nombre_url,url, fyh_creacion, estado)
VALUES ( :nombre_url,:url,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombre_url',$nombre_url);
$sentencia->bindParam(':url',$url);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "El registro ha sido exitoso";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."admin/roles/permisos.php");
}else{
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se logro registras 'Comuniquese con el 'ADMINISTRADOR' ";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}