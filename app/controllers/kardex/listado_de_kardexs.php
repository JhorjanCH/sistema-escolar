<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */

$sql_kardexs = "SELECT * FROM kardexs AS kar
INNER JOIN docentes AS doc ON doc.id_docente = kar.docente_id
INNER JOIN personas AS per ON per.id_persona = doc.persona_id
INNER JOIN usuarios AS usu ON usu.id_usuario = per.usuario_id
INNER JOIN materias AS mat ON mat.id_materia = kar.materia_id
INNER JOIN estudiantes AS est ON est.id_estudiante = kar.estudiante_id
";
$query_kardexs = $pdo->prepare($sql_kardexs);
$query_kardexs->execute();
$kardexs = $query_kardexs->fetchAll(PDO::FETCH_ASSOC);