<?php
session_start();
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
    $descricao = $conn->real_escape_string($_POST['explicacao']);
    $tipo = $conn->real_escape_string($_POST['tipo']);
    $usuario_id = $_SESSION['usuario_id'];
    $id_monitoria = $_SESSION['id_monitoria'];

    // Valida e move o arquivo enviado
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
        $nome_arquivo = $_FILES['arquivo']['name'];
        $caminho_temporario = $_FILES['arquivo']['tmp_name'];
        $destino = "uploads/" . basename($nome_arquivo);

        if (move_uploaded_file($caminho_temporario, $destino)) {
            // Insere o registro no banco de dados
            $sql = "INSERT INTO documentos (descricao, monitoria_id, usuario_id, data_pedido, doc, tipo) 
                    VALUES ('$descricao', '$id_monitoria', '$usuario_id', NOW(), '$nome_arquivo', '$tipo')";

            if ($conn->query($sql) === TRUE) {
                echo "
                <script>
                alert('Documento enviado com sucesso!');
                window.history.back();
                </script>";
                exit;
            } else {
                echo "
                <script>
                alert('Erro ao salvar os dados no banco.');
                window.history.back();
                </script>";
                exit;
            }
        } else {
            echo "
            <script>
            alert('Erro ao mover o arquivo para o diretório de uploads.');
            window.history.back();
            </script>";
            exit;
        }
    } else {
        echo "
        <script>
        alert('Erro no envio do arquivo.');
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
