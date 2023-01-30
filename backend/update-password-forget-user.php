<?php
include 'main.php';

$senha = $_POST['senha'] ?? null;
$chave = $_POST['chave'] ?? null;


$stmt = $conn->query("UPDATE ALUNO SET ALU_SENHA='$senha' WHERE ALU_EMAIL = '$chave' ");
$stmt->execute([]);
