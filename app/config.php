<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
define ('SERVIDOR', 'localhost');
define ('USUARIO', 'root');
define ('PASSWORD', '');
define ('BD', 'sisgestion');

define ('APP_NAME','SISTEMA DE GESTIÓN');
define ('APP_URL','http://localhost/sisgestion/');
define ('KEY_API_MAPS','');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "Conexión exitosa a la base de datos";
}catch (PDOException $e){
     //print_r($e);
    echo "error no se pudo conectar a la base de datos";
}

date_default_timezone_set ("America/caracas");
$fechaHora = date (format:'Y-m-d h:i:s');

$fecha_actual = date(format: 'd-m-Y');
$dia_actual = date(format: 'd');
$mes_actual = date(format:'m');
$ano_actual = date(format:'Y');

$estado_de_registro = '1';
