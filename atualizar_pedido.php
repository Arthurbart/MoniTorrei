<?php
include ('conexao.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Corrigir o acesso à variável do pedido_id
    $pedido_id = intval($_POST['pedido_id']);
    $status = htmlspecialchars($_POST['status']);
    
    // Verificar o status de maneira mais flexível
    $status = strtolower($status); // Converte para minúsculas para facilitar a comparação

    if ($pedido_id && in_array($status, ['aceito', 'negado'])) {
        $sql_update = "UPDATE pedidos_conteudo SET status = '$status' WHERE id = $pedido_id";
        
        if ($conn->query($sql_update) === TRUE) {
            echo "
            <script>
                alert('Ação realizada com sucesso');
                window.history.back();
            </script>";
            exit();
        } else {
            echo "
            <script>
                alert('Erro ao realizar ação');
                window.history.back();
            </script>"; 
            exit();
        }
    } else {
        echo "
        <script>
            alert('Dados inválidos');
            window.history.back();
        </script>";           
        exit();
    }
}
?>
