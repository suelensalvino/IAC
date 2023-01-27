<?php
include 'main.php';

$stmt = $conn->query("SELECT ALU_EMAIL, ALU_MATRICULA from ALUNO where ALU_MATRICULA != 'null' and ALU_EMAIL != 'null'

");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
