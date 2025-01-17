<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

$sql_calificaciones = "SELECT * FROM calificaciones as cal  
INNER JOIN materias as mat ON mat.id_materia = cal.materia_id WHERE cal.estado = '1' ";
$query_calificaciones = $pdo->prepare($sql_calificaciones);
$query_calificaciones->execute();
$calificaciones = $query_calificaciones->fetchAll(PDO::FETCH_ASSOC);