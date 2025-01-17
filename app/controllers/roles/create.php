<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

include ('../../../app/config.php');

$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol, 'UTF-8');

if ($nombre_rol == "") {
    session_start();
    $_SESSION['mensaje'] = "Llene el campo nombre de rol";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/roles/create.php");
}else {
    $sentencia = $pdo->prepare("INSERT INTO roles
       ( nombre_rol, fyh_creacion, estado)
VALUES (:nombre_rol,:fyh_creacion,:estado)");

    $sentencia->bindParam('nombre_rol', $nombre_rol);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->bindParam('estado', $estado_de_registro);

    try {
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "El registro ha sido exitoso";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/roles");
        }else{
            session_start();
            $_SESSION['mensaje'] = "Error no se logro registras 'Comuniquese con el 'ADMINISTRADOR' ";
            $_SESSION['icono'] = "error";
            header('Location:'.APP_URL."/admin/roles/create.php");
        }
    }catch (Exception $exception) {
        session_start();
            $_SESSION['mensaje'] = "Este rol ya existe en la base de datos";
            $_SESSION['icono'] = "error";
            ?><script>window.history.back();</script><?php
    }

    
}

