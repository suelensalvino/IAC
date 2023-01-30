<?php
include 'main.php';



$stmt = $conn->query('SELECT ALU_EMAIL, ALU_RESPOSTA FROM ALUNO');
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($data);
