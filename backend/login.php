<?php
require 'main.php';

$matricula = $_POST['matricula'] ?? null;
$senha = $_POST['senha'] ?? null;

$stmt = $conn->prepare('SELECT * FROM `ALUNO` WHERE `ALU_MATRICULA` = :matricula AND `ALU_SENHA` = :senha');
$stmt->execute([
  'matricula' => $matricula,
  'senha' => $senha
]);

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);

if (sizeof($data) == 0) {
  http_response_code(401);
  exit();
}

$user = $data[0];
$_SESSION['user'] = $user;
http_response_code(200);
session_start();
