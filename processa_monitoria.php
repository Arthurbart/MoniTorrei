<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.html");
    exit();
}

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "monitorrei";

$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Processa os dados do formulário
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome_monitoria = $conn->real_escape_string($_POST['nome_monitoria']);
    $matricula_monitor = $conn->real_escape_string($_POST['matricula_monitor']);
    $nome_monitor = $conn->real_escape_string($_POST['nome_monitor']);
    $curso = $conn->real_escape_string($_POST['curso']);
    $horario = $conn->real_escape_string($_POST['horario']);
    $sala = $conn->real_escape_string($_POST['local']);
    
    // Busca o ID do usuário com base na matrícula
    $query_usuario = "SELECT id FROM usuario WHERE matricula = '$matricula_monitor' LIMIT 1";
    $resultado_usuario = $conn->query($query_usuario);

    if ($resultado_usuario->num_rows > 0) {
        $row = $resultado_usuario->fetch_assoc();
        $id_usuario = $row['id'];

        // Insere os dados no banco
        $sql = "INSERT INTO monitorias (nome, sala, horario, usuario_id, curso) 
                VALUES ('$nome_monitoria', '$sala', '$horario', '$id_usuario', '$curso')";

        if ($conn->query($sql) === TRUE) {
            // Redireciona com mensagem de sucesso
            $_SESSION['mensagem'] = "Monitoria adicionada com sucesso!";
            header("Location: monitorias.php");
            exit();
        } else {
            // Redireciona com mensagem de erro
            $_SESSION['mensagem'] = "Erro ao adicionar a monitoria: " . $conn->error;
            header("Location: adicionar_monitoria.php");
            exit();
        }
        } else {
        // Matrícula não encontrada
        $_SESSION['mensagem'] = "Matrícula não encontrada na tabela de usuários.";
        header("Location: adicionar_monitoria.php");
        exit();
        }
        } else {
        // Redireciona caso o acesso não seja via POST
        header("Location: adicionar_monitoria.php");
        exit();
    }

// Fecha a conexão
$conn->close();
?>
