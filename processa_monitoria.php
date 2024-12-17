<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtendo os dados do formulário e sanitizando
    $nome_monitoria = $conn->real_escape_string($_POST['nome_monitoria']);
    $matricula_monitor = $conn->real_escape_string($_POST['matricula_monitor']);
    $nome_monitor = $conn->real_escape_string($_POST['nome_monitor']);
    $curso = $conn->real_escape_string($_POST['curso']);
    $horario = $conn->real_escape_string($_POST['horario']);
    $sala = $conn->real_escape_string($_POST['local']);
    $dias = $conn->real_escape_string($_POST['dias']);

    // Consulta para buscar o ID do monitor
    $query_usuario = "SELECT id FROM usuario WHERE matricula = '$matricula_monitor' LIMIT 1";
    $resultado_usuario = $conn->query($query_usuario);

    if ($resultado_usuario && $resultado_usuario->num_rows > 0) {
        $row = $resultado_usuario->fetch_assoc();
        $id_monitor = $row['id'];

        // Inserindo a monitoria no banco de dados
        $sql = "INSERT INTO monitorias (nome, sala, horario, usuario_id, curso, dias) 
                VALUES ('$nome_monitoria', '$sala', '$horario', '$id_monitor', '$curso', '$dias')";
        
        if ($conn->query($sql) === TRUE) {
            echo "
            <script>
                alert('Monitoria adicionada com sucesso!');
                window.location.href = 'monitorias.php';
            </script>";
            exit();
        } else {
            echo "
            <script>
                alert('Erro ao adicionar a monitoria.');
                window.location.href = 'adicionar.php';
            </script>";
            exit();
        }
    } else {
        echo "
        <script>
            alert('Aluno não encontrado.');
            window.location.href = 'adicionar.php';
        </script>";
        exit();
    }
}

// Fecha a conexão
$conn->close();
?>
