<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

$sql_pagos = "SELECT * FROM pagos WHERE estado = '1' and estudiante_id = '$id_estudiante' ";
$query_pagos = $pdo->prepare($sql_pagos);
$query_pagos->execute();
$pagos = $query_pagos->fetchAll(PDO::FETCH_ASSOC);