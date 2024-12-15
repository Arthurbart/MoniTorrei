<?php
require('fpdf/fpdf.php');
include('conexao.php');

class PDF extends FPDF
{
    // Cabeçalho do PDF
    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Relatório de Chamada'), 0, 1, 'C');
        $this->Ln(10);
    }

    // Rodapé do PDF
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo(), 0, 0, 'C');
    }
}

// Obtém o ID da monitoria via GET
$id_monitoria = isset($_GET['id_monitoria']) ? intval($_GET['id_monitoria']) : 0;

if ($id_monitoria === 0) {
    die("ID da monitoria inválido.");
}

// Cria o PDF
$pdf = new PDF();
$pdf->AddPage();

// Busca os dias de monitoria
$query_dias = "SELECT DISTINCT data_presenca FROM presencas WHERE monitoria_id = $id_monitoria ORDER BY data_presenca DESC";
$result_dias = mysqli_query($conn, $query_dias);

if (mysqli_num_rows($result_dias) > 0) {
    while ($row_dia = mysqli_fetch_assoc($result_dias)) {
        $data_presenca = $row_dia['data_presenca'];
        $dia_formatado = date('d/m/Y', strtotime($data_presenca));

        // Adiciona a data no relatório
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, utf8_decode("Monitoria do dia: $dia_formatado"), 0, 1);
        $pdf->Ln(5);

        // Busca os alunos presentes neste dia
        $query_alunos = "
            SELECT u.nome, u.matricula, p.feedback
            FROM presencas p
            INNER JOIN usuario u ON p.usuario_id = u.id
            WHERE p.monitoria_id = $id_monitoria AND p.data_presenca = '$data_presenca'
        ";
        $result_alunos = mysqli_query($conn, $query_alunos);

        if (mysqli_num_rows($result_alunos) > 0) {
            $pdf->SetFont('Arial', '', 11);
            while ($row_aluno = mysqli_fetch_assoc($result_alunos)) {
                $nome = utf8_decode($row_aluno['nome']);
                $matricula = $row_aluno['matricula'];
                $feedback = utf8_decode($row_aluno['feedback']);

                // Adiciona o nome e matrícula do aluno
                $pdf->Cell(0, 7, "$nome ($matricula)", 0, 1);

                // Adiciona o feedback
                $pdf->SetFont('Arial', 'I', 10);
                $pdf->MultiCell(0, 7, "Feedback: $feedback", 0, 1);
                $pdf->SetFont('Arial', '', 11);
                $pdf->Ln(2);
            }
        } else {
            $pdf->SetFont('Arial', '', 11);
            $pdf->Cell(0, 7, utf8_decode('Nenhum aluno presente.'), 0, 1);
        }

        $pdf->Ln(10);
    }
} else {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, utf8_decode('Nenhuma monitoria encontrada.'), 0, 1);
}

// Fecha a conexão
mysqli_close($conn);

// Gera o PDF e abre em uma nova página
$pdf->Output('I', 'relatorio_chamada.pdf'); // "I" exibe o PDF diretamente no navegador
?>
