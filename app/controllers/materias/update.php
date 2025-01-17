<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../../../app/config.php');

$id_materia = $_POST['id_materia'];
$nombre_materia = $_POST['nombre_materia'];

$sentencia = $pdo->prepare('UPDATE materias
SET nombre_materia=:nombre_materia,
    fyh_actualizacion=:fyh_actualizacion
WHERE id_materia=:id_materia');

$sentencia->bindParam(':nombre_materia',$nombre_materia);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_materia',$id_materia);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el grado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/materias");
}else{
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se logro actualizar 'Comuniquese con el 'ADMINISTRADOR' ";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}