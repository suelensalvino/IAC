<?php
include 'main.php';

if (!isset($_SESSION['user'])) {
    http_response_code(401);
    exit();
}


$stmt = $conn->query('SELECT TIP_DATA, TIP_CODIGO, TIP_ENTRADA, TIP_SAIDA, ALUNO_ALU_CODIGO, ALU_CODIGO FROM tipo INNER JOIN aluno ON tipo.ALUNO_ALU_CODIGO = aluno.ALU_CODIGO WHERE tipo.ALUNO_ALU_CODIGO = ' . $_SESSION["user"]["ALU_CODIGO"]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
