<?php
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
?>