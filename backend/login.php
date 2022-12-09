<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

session_start();

require_once(__DIR__.'/db/database.php');

try{
  $q = $pdo->prepare('SELECT * FROM `ALUNO` WHERE `ALU_MATRICULA` = :matricula AND `ALU_SENHA` = :senha');
  $q->bindValue(':matricula', $_POST['matricula']);
  $q->bindValue(':senha', $_POST['senha']);
  $q->execute();
}catch(PDOException $ex){
  http_response_code(500);
  echo json_encode((object)[
    "message" => "Erro ao tentar fazer login"
  ]);
}

?>