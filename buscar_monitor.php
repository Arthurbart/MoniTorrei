<?php
// Conexão com o banco de dados
include('conexao.php');

// Verificar a conexão
if (!$conn) {
    die("Erro ao conectar: " . mysqli_connect_error());
}

// Receber a matrícula via GET
if (isset($_GET['matricula'])) {
    $matricula = mysqli_real_escape_string($conn, $_GET['matricula']);

    // Buscar o monitor pela matrícula
    $sql = "SELECT nome FROM usuario WHERE matricula = '$matricula' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode(['sucesso' => true, 'nome' => $row['nome']]);
    } else {
        echo json_encode(['sucesso' => false]);
    }
} else {
    echo json_encode(['sucesso' => false]);
}

// Fechar a conexão
mysqli_close($conn);
?>
