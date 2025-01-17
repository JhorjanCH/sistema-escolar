<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

include ('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];

$password = $_POST['password'];
$password_repet = $_POST['password_repet'];

if ($password == "") {
        $sentencia = $pdo->prepare("UPDATE usuarios 
        SET rol_id=:rol_id,
            email=:email,
            fyh_actualizacion=:fyh_actualizacion
        WHERE id_usuario=:id_usuario ");
    
        $sentencia->bindParam(':rol_id',$rol_id);
        $sentencia->bindParam(':email',$email);
        $sentencia->bindParam('fyh_actualizacion',$fechaHora);
        $sentencia->bindParam(':id_usuario',$id_usuario);
    
    try {
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Se actualizó el usuario correctamente";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/usuarios");
            }else{
                session_start();
                $_SESSION['mensaje'] = "Erros no se logro actualizar 'Comuniquese con el administrador' ";
                $_SESSION['icono'] = "error";
                ?><script>window.history.back();</script><?php
            }
    } catch (Exception $exception) {
        session_start();
        $_SESSION['mensaje'] = "El email ya existe en la base de datos intente con otro";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php    
    }
    

}else {
    if ($password == $password_repet) {
        //echo "Las contraseñas son iguales";
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sentencia = $pdo->prepare("UPDATE usuarios 
        SET rol_id=:rol_id,
            email=:email,
            password=:password,
            fyh_actualizacion=:fyh_actualizacion
        WHERE id_usuario=:id_usuario ");
    
        $sentencia->bindParam(':rol_id',$rol_id);
        $sentencia->bindParam(':email',$email);
        $sentencia->bindParam(':password',$password);
        $sentencia->bindParam('fyh_actualizacion',$fechaHora);
        $sentencia->bindParam(':id_usuario',$id_usuario);
    
    try {
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Se actualizó el usuario correctamente";
            $_SESSION['icono'] = "success";
            header('Location:'.APP_URL."/admin/usuarios");
            }else{
                session_start();
                $_SESSION['mensaje'] = "Erros no se logro actualizar 'Comuniquese con el administrador' ";
                $_SESSION['icono'] = "error";
                ?><script>window.history.back();</script><?php
            }
    } catch (Exception $exception) {
        session_start();
        $_SESSION['mensaje'] = "El email ya existe en la base de datos intente con otro";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php    
    }
    
    }else {
        //echo "Las contraseñas no son iguales";
        session_start();
        $_SESSION['mensaje'] = "Las contraseñas no coinciden intente de nuevo";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php        
    }
}

