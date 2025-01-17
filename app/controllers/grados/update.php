<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../../../app/config.php');

$id_grado = $_POST['id_grado'];
$nivel_id = $_POST['nivel_id'];
$curso = $_POST['curso'];
$seccion = $_POST['seccion'];

$sentencia = $pdo->prepare('UPDATE grados
SET nivel_id=:nivel_id,
    curso=:curso,
    seccion=:seccion,
    fyh_actualizacion=:fyh_actualizacion
WHERE id_grado=:id_grado');

$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':curso',$curso);
$sentencia->bindParam(':seccion',$seccion);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_grado',$id_grado);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el grado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/grados");
}else{
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se logro actualizar 'Comuniquese con el 'ADMINISTRADOR' ";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}