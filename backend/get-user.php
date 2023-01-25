<?php
    include 'main.php';

    if (!isset($_SESSION['user'])) {
        http_response_code(401);
        exit();
    }

    $stmt = $conn->query('SELECT * FROM tipo WHERE user_id = ' . $_SESSION['user']['id']);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
