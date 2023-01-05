<?php
    include 'main.php';

    $q = $pdo->query('SELECT * FROM TIPO');
    $data = $q->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
?>