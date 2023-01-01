<?php
require 'main.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$matricula = $_POST['matricula'];
$resposta = $_POST['resposta'];
$senha = $_POST['senha'];

try{
    $q = $pdo->prepare('INSERT INTO ALUNO VALUES (null, :nome, :email, :matricula, :resposta, :senha)');
    $q->execute([
        'nome' => $nome,
        'email' => $email,
        'matricula' => $matricula,
        'resposta' => $resposta,
        'senha' => $senha
    ]);
}catch(PDOException $ex){
    echo 'Erro ao cadastrar usuario';
}

?>