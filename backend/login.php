<?php
require 'main.php';

 $matricula = $_POST['matricula'];
 $senha = $_POST['senha'];

 $q = $pdo->prepare('SELECT * FROM `ALUNO` WHERE `ALU_MATRICULA` = :matricula AND `ALU_SENHA` = :senha');
 $q->execute([
   'matricula' => $matricula,
   'senha' => $senha
 ]);

$data = $q->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);

if (sizeof($data) == 0) {
  http_response_code(401);
  exit();
}

$user = $data[0];
$_SESSION['user'] = $user;
http_response_code(200);
