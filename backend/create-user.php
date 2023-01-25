<?php
require 'main.php';

$nome = $_POST['nome'] ?? null;
$email = $_POST['email'] ?? null;
$matricula = $_POST['matricula'] ?? null;
$resposta = $_POST['resposta'] ?? null;
$senha = $_POST['senha'] ?? null;

try {
    $q = $pdo->prepare('INSERT INTO ALUNO VALUES (null, :nome, :email, :matricula, :resposta, :senha)');
    $q->execute([
        'nome' => $nome,
        'email' => $email,
        'matricula' => $matricula,
        'resposta' => $resposta,
        'senha' => $senha
    ]);
} catch (PDOException $ex) {
    echo 'Erro ao cadastrar usuario';
}
