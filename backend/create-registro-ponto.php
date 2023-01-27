<?php
include 'main.php';


if (!isset($_SESSION['user'])) {
    http_response_code(401);
    exit();
}


$data = $_POST['data'] ?? null;
$entrada = $_POST['entrada']  ?? null;
$saida = $_POST['saida']  ?? null;
$codigo = $_SESSION['user']['ALU_CODIGO'];

try {
    $stmt = $conn->prepare('INSERT INTO TIPO VALUES (null, :data, :entrada, :saida, :codigo)');
    $stmt->execute([
        'data' => $data,
        'entrada' => $entrada,
        'saida' => $saida,
        'codigo' => $codigo
    ]);
} catch (PDOException $ex) {
    echo 'Erro ao cadastrar usuario';
}
