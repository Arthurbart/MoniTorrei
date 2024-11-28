<?php
    // Extrai o nome da monitoria do nome da página
    $nome_monitoria = basename($_SERVER['PHP_SELF'], '.php');  // Pega o nome da página, removendo a extensão '.php'
    
    // Prepara a consulta para obter os detalhes da monitoria com base no nome
    $sql = "
        SELECT 
            m.id, 
            m.nome, 
            m.horario, 
            m.sala, 
            m.dias,
            u.nome AS usuario_nome, 
            m.curso 
        FROM monitorias m
        JOIN usuario u ON m.usuario_id = u.id
        WHERE m.nome = '$nome_monitoria' AND m.status = 'ativo'
    ";
    
    $result = $conn->query($sql);
    
    // Verifica se a monitoria foi encontrada
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_monitoria = htmlspecialchars($row['id']);
        $monitor_nome = htmlspecialchars($row['usuario_nome']);
        $curso = htmlspecialchars($row['curso']);
        $horario = htmlspecialchars($row['horario']);
        $sala = htmlspecialchars($row['sala']);
        $nome = htmlspecialchars($row['nome']);
        $dias = htmlspecialchars($row['dias']);
        $_SESSION['curso'] = $curso;
        $_SESSION['nome_monitoria'] = $nome;
        $_SESSION['sala'] = $sala;
        $_SESSION['horario'] = $horario;
        $_SESSION['id_monitoria'] = $id_monitoria;

    } 
?>