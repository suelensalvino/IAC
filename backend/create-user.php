<?php
header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json');

if(!isset($_POST['nome'])){err('Preencha seu nome', __LINE__);}
if(!isset($_POST['email'])){err('Preencha seu e-mail', __LINE__);}
if(!isset($_POST['matricula'])){err('Preencha sua matricula', __LINE__);}
if(!isset($_POST['resposta'])){err('Preencha sua resposta', __LINE__);}
if(!isset($_POST['senha'])){err('Preencha sua senha', __LINE__);}

require_once(__DIR__.'/db/database.php');

try{
    $q = $pdo->prepare('INSERT INTO ALUNO VALUES (:nome, :email, :matricula, :resposta, :senha)');
    $q->bindValue(':nome', $_POST['ALU_NOME']);
    $q->bindValue(':email', $_POST['ALU_EMAIL']);
    $q->bindValue(':matricula', $_POST['ALU_MATRICULA']);
    $q->bindValue(':resposta', $_POST['ALU_RESPOSTA']);
    $q->bindValue(':senha', $_POST['ALU_SENHA']);
    $q->execute();
    $userId = $pdo->lastInsertId();
}catch(PDOException $ex){
    err('Erro ao cadastrar usuario', __LINE__);
}

echo '{"status":1, "message": "usuario criado", "id":"'.$userId.'"}';

function err($message = 'error', $debug = 0){
    echo '{
        "status":0,
        "message":"'.$message.'",
        "debug":'.$debug.'
    }';
    exit();
}