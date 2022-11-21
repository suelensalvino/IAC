<?php

try {
    $dsn = 'mysql:dbname=' . 'IAC' . ';host=' . 'localhost' . ';port=' . 3306 . ';charset=utf8';

    $pdo = new PDO($dsn, 'admin', 'root');

    return $pdo;
} catch (PDOException $e) {
    echo 'Erro ao conectar com o MySql: ' . $e->getMessage();
}

?>