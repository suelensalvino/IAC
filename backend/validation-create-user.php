<?php
include 'main.php';

$stmt = $conn->query("SELECT ALU_EMAIL, ALU_MATRICULA 
FROM ALUNO 
WHERE ALU_MATRICULA != 'null' 
AND ALU_EMAIL != 'null'

");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
