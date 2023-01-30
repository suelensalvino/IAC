<?php
include 'main.php';

if (!isset($_SESSION['user'])) {
    http_response_code(401);
    exit();
}

$stmt = $conn->query('SELECT * FROM ALUNO WHERE ALU_CODIGO = ' . $_SESSION["user"]["ALU_CODIGO"]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($data);
