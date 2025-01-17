<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../../../app/config.php');

$estudiante_id = $_POST['estudiante_id'];
$mes_pagado = $_POST['mes_pagado'];
$monto_pagado = $_POST['monto_pagado'];
$fecha_pago = $_POST['fecha_pago'];

$sentencia = $pdo->prepare('INSERT INTO pagos
(estudiante_id,mes_pagado,monto_pagado,fecha_pago, fyh_creacion, estado)
VALUES ( :estudiante_id,:mes_pagado,:monto_pagado,:fecha_pago,:fyh_creacion,:estado)');

$sentencia->bindParam(':estudiante_id',$estudiante_id);
$sentencia->bindParam(':mes_pagado',$mes_pagado);
$sentencia->bindParam(':monto_pagado',$monto_pagado);
$sentencia->bindParam('fecha_pago',$fecha_pago);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_de_registro);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "El registro ha sido exitoso";
    $_SESSION['icono'] = "success";
    ?><script>window.history.back();</script><?php 
}else{
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se logro registras 'Comuniquese con el 'ADMINISTRADOR' ";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php 
}