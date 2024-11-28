<?php
include('conexao.php');

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o usuário está logado
    if (!isset($_SESSION['usuario_id'])) {
        echo "
        <script>
        alert('Você não está logado, direcionando para página de login...');
        window.location.href = 'index.html';
        </script>";
        exit;
    }

    // Obtém os dados enviados do formulário
    $pedido = $conn->real_escape_string($_POST['pedido']);
    $usuario_id = $_SESSION['usuario_id'];
    $data_pedido = date('Y-m-d H:i:s'); // Data e hora atual no formato padrão do MySQL
    $status = 'Em Aguardo'; // Status inicial do pedido
    $id_monitoria = $_SESSION['id_monitoria'];

    // Insere o pedido no banco de dados
    $sql = "INSERT INTO pedidos_conteudo (conteudo, monitoria_id, usuario_id, data_pedido, status) 
            VALUES ('$pedido', '$id_monitoria', '$usuario_id', '$data_pedido', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "
        <script>
        alert('Pedido enviado com sucesso!');
        window.history.back();
        </script>";
        exit;
    } else {
        echo "
        <script>
        alert('Erro ao enviar pedido.');
        window.history.back();
        </script>";
        exit;
    }
} else {
    echo "
    <script>
    alert('Acesso inválido.');
    window.history.back();
    </script>";
    exit;
}

// Fecha a conexão
$conn->close();
?>
