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
    $q = $pdo->prepare('INSERT INTO ALUNO VALUES (null, :nome, :email, :matricula, :resposta, :senha)');
    $q->bindValue(':nome', $_POST['nome']);
    $q->bindValue(':email', $_POST['email']);
    $q->bindValue(':matricula', $_POST['matricula']);
    $q->bindValue(':resposta', $_POST['resposta']);
    $q->bindValue(':senha', $_POST['senha']);
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