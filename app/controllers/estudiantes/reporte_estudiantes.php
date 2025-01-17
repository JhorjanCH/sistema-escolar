<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

$sql_estudiantes = "SELECT * FROM estudiantes WHERE estado = '1' ";
$query_estudiantes = $pdo->prepare($sql_estudiantes);
$query_estudiantes->execute();
$reportes_estudiantes = $query_estudiantes->fetchAll(PDO::FETCH_ASSOC);

