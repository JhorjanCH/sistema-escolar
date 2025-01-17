<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
include ('../../../app/config.php');

$id_pago = $_POST['id_pago'];
$estudiante_id = $_POST['estudiante_id'];
$mes_pagado = $_POST['mes_pagado'];
$monto_pagado = $_POST['monto_pagado'];
$fecha_pago = $_POST['fecha_pago'];

$sentencia = $pdo->prepare('UPDATE pagos
    SET mes_pagado=:mes_pagado,
        monto_pagado=:monto_pagado,
        fecha_pago=:fecha_pago,
        fyh_actualizacion=:fyh_actualizacion
    WHERE id_pago=:id_pago ');

$sentencia->bindParam(':mes_pagado',$mes_pagado);
$sentencia->bindParam(':monto_pagado',$monto_pagado);
$sentencia->bindParam('fecha_pago',$fecha_pago);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_pago',$id_pago);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el pago correctamente";
    $_SESSION['icono'] = "success";
    ?><script>window.history.back();</script><?php 
}else{
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se logro actualizar 'Comuniquese con el 'ADMINISTRADOR' ";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php 
}