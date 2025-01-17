<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../app/config.php');

session_start();

if(isset($_SESSION['sesion_email'])){
    session_destroy();
    header('Location: '.APP_URL.'/login');
}