<?php
include 'main.php';
require_once 'vendor/autoload.php';

$html = '<table style="font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%;>
        <tr style="border: 1px solid #ddd;>
            <th></th>
            <th></th>
            <th></th>
        </tr>
';


if (!isset($_SESSION['user'])) {
    http_response_code(401);
    exit();
}

$query = 'SELECT TIP_DATA, TIP_CODIGO, TIP_ENTRADA, TIP_SAIDA, ALUNO_ALU_CODIGO, ALU_CODIGO FROM TIPO INNER JOIN ALUNO ON ALUNO_ALU_CODIGO = ALU_CODIGO WHERE ALUNO_ALU_CODIGO = ' . $_SESSION["user"]["ALU_CODIGO"];

$stmt = $conn->prepare($query);
$stmt->execute();

while ($pdf = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $html .= '<tr>';
    $html .= '<td>' . $pdf['TIP_DATA'] . '</td>';
    $html .= '<td>' . $pdf['TIP_ENTRADA'] . '</td>';
    $html .= '<td>' . $pdf['TIP_SAIDA'] . '</td></tr>
    ';
}

$html .= '</tbody>';
$html .= '</table';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml('

<h1 style="text-align: center;">Relatório de ponto</h1>
<table style="font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%;">
    <tr style="border: 1px solid #ddd; padding: 8px;">
        <th>Data</th>
        <th>Entrada</th>
        <th>Saída</th>
    </tr>
</table>
    ' . $html . '
');

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream(
    "relatorio-iac.pdf",
    array(
        "Attachment" => true
    )
);

?>