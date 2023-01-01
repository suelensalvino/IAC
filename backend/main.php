<?php
    header('Access-Control-Allow-Origin: http://localhost:5173');
    header('Access-Control-Allow-Credentials: true');

    try {
        $dsn = 'mysql:dbname=' . 'IAC' . ';host=' . 'localhost' . ';port=' . 3306 . ';charset=utf8';
    
        $pdo = new PDO($dsn, 'admin', 'root');
    
        return $pdo;
    } catch (PDOException $e) {
        echo 'Erro ao conectar com o MySql: ' . $e->getMessage();
    }

    session_start();
?>