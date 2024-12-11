<?php
// Conexão com o banco de dados
include('conexao.php');

// Verifica se o id da monitoria foi enviado
if (isset($_POST['monitoria_id'])) {
    $monitoriaId = $_POST['monitoria_id'];
    
    // Verifica se a monitoria está ativa ou desativada
    $sql = "SELECT status FROM monitorias WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $monitoriaId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $statusAtual = $row['status'];
        
        // Altera o status da monitoria
        if ($statusAtual == 'ativo') {
            // Se estiver ativa, desativa
            $novoStatus = 'desativado';
        } else {
            // Se estiver desativada, ativa
            $novoStatus = 'ativo';
        }

        // Atualiza o status no banco de dados
        $sqlUpdate = "UPDATE monitorias SET status = ? WHERE id = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("si", $novoStatus, $monitoriaId);
        $stmtUpdate->execute();

        // Redireciona de volta para a página onde o usuário estava
        echo "
        <script>
        alert('Monitoria alterada com sucesso.');
        window.history.back();
        </script>";
        exit;    
    }
}
?>
