<?php
    include 'main.php';

    $data = $_POST['data'];
    $entrada = $_POST['entrada'];
    $saida = $_POST['saida'];

    $q = $pdo->prepare('INSERT INTO TIPO VALUES (null, ?, ?, ?)');
    $q->execute([
        $data,
        $entrada,
        $saida
    ]);
?>