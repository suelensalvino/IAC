<?php
include 'main.php';

$q = $pdo->query("SELECT ALU_EMAIL, ALU_MATRICULA from aluno where ALU_MATRICULA != 'null' and ALU_EMAIL != 'null'

");
$data = $q->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
