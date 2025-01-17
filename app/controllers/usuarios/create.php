<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

 
 include ('../../../app/config.php');
 

 $rol_id = $_POST['rol_id'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $password_repet = $_POST['password_repet'];
 
 if($password == $password_repet){
     //echo "las contraseñas son iguales";
     $password = password_hash($password, PASSWORD_DEFAULT);
 
     $sentencia = $pdo->prepare('INSERT INTO usuarios
        (rol_id,email,password, fyh_creacion, estado)
 VALUES (:rol_id,:email,:password,:fyh_creacion,:estado)');
 

     $sentencia->bindParam(':rol_id',$rol_id);
     $sentencia->bindParam(':email',$email);
     $sentencia->bindParam(':password',$password);
     $sentencia->bindParam('fyh_creacion',$fechaHora);
     $sentencia->bindParam('estado',$estado_de_registro);
 
     try{
         if($sentencia->execute()){
             session_start();
             $_SESSION['mensaje'] = "El registro ha sido exitoso";
             $_SESSION['icono'] = "success";
             header('Location:'.APP_URL."/admin/usuarios");
         }else {
             session_start();
             $_SESSION['mensaje'] = "Error no se logro registras 'Comuniquese con el 'ADMINISTRADOR'";
             $_SESSION['icono'] = "error";
             ?><script>window.history.back();</script><?php
         }
     }catch (Exception $exception){
         session_start();
         $_SESSION['mensaje'] = "El email de este usuario ya existe en la base de datos";
         $_SESSION['icono'] = "error";
         ?><script>window.history.back();</script><?php
     }
 
 
 }else{
     echo "las contraseñas no son iguales";
     session_start();
     $_SESSION['mensaje'] = "Las contraseñas introducidas no son iguales";
     $_SESSION['icono'] = "error";
     ?><script>window.history.back();</script><?php
 }
 
 
 
 
 
 
 