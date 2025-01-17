<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../../../app/config.php');

$nivel_id = $_POST['nivel_id'];
$curso = $_POST['curso'];
$seccion = $_POST['seccion'];

$sentencia = $pdo->prepare('INSERT INTO grados
(nivel_id,curso,seccion, fyh_creacion, estado)
VALUES ( :nivel_id,:curso,:seccion,:fyh_creacion,:estado)');

$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':curso',$curso);
$sentencia->bindParam(':seccion',$seccion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "El registro ha sido exitoso";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/grados");
}else{
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se logro registras 'Comuniquese con el 'ADMINISTRADOR' ";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}