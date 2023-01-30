<?php
include 'main.php';

if (!isset($_SESSION['user'])) {
    http_response_code(401);
    exit();
}

$senha = $_POST['senha'] ?? null;

$stmt = $conn->query("UPDATE ALUNO SET ALU_SENHA='$senha' WHERE ALU_CODIGO = " . $_SESSION["user"]["ALU_CODIGO"]);
$stmt->execute([]);
