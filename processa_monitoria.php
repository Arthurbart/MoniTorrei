<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome_monitoria = $conn->real_escape_string($_POST['nome_monitoria']);
    $matricula_monitor = $conn->real_escape_string($_POST['matricula_monitor']);
    $nome_monitor = $conn->real_escape_string($_POST['nome_monitor']);
    $curso = $conn->real_escape_string($_POST['curso']);
    $horario = $conn->real_escape_string($_POST['horario']);
    $sala = $conn->real_escape_string($_POST['local']);
    $dias = $conn->real_escape_string($_POST['dias']);
    
    $query_usuario = "SELECT id FROM usuario WHERE matricula = '$matricula_monitor' LIMIT 1";
    $resultado_usuario = $conn->query($query_usuario);

    if ($resultado_usuario->num_rows > 0) {
        $row = $resultado_usuario->fetch_assoc();
        $id_monitor = $row['id'];
        $_SESSION['id_monitor'] = $id_monitor;
        $usuario_id = $_SESSION['usuario_id'];

        $sql = "INSERT INTO monitorias (nome, sala, horario, usuario_id, curso, dias) 
                VALUES ('$nome_monitoria', '$sala', '$horario', '$id_monitor', '$curso', '$dias')";

        if ($conn->query($sql) === TRUE) {
            $nome_arquivo = strtolower(str_replace(' ', '_', $nome_monitoria)) . '.php';
            $conteudo_arquivo = <<<HTML
                <html lang="pt-br">
                <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <title>Monitoria - $nome_monitoria</title>
                  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
                  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
                  <style>
                    .banner {
                      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(imgs/banner-estudo.png) no-repeat center ;
                      background-size: cover;
                      background-position: center;
                      color: white;
                      height: 200px;
                      position: relative;
                    }
                    .banner img {
                      position: absolute;
                      bottom: -30px;
                      right: 20px;
                      border-radius: 50%;
                      border: 4px solid white;
                      width: 100px;
                      height: 100px;
                    }
                    .card-header-custom {
                      background-color: #f8f9fa;
                      font-weight: bold;
                      font-size: 1.2rem;
                      padding: 1rem;
                    }
                    .icon-voltar {
                      font-size: 16px;
                      color: #6c757d;
                    }
                    .pedido-header img, .resposta-monitor img {
                      border-radius: 50%;
                    }
                    .card-pedido {
                      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                    }
                  </style>
                </head>
                <body>

                <?php 
                    include('conexao.php');
                    include('navbar.php');
                    include('dados_monitoria.php');

                    if (\$_SESSION['usuario_id'] == $id_monitor) { 
                        include('info_monitor.php');
                    } elseif (\$_SESSION['cargo'] == 2) {
                        include('info_professor.php');
                    } else {
                        include('info_monitoria.php');
                    }
                  ?>
                  <!-- Scripts -->
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
                </body>
                </html>
      HTML;

            // Cria o arquivo
            if (file_put_contents($nome_arquivo, $conteudo_arquivo)) {
                echo "
                <script>
                    alert('Monitoria adicionada com sucesso e arquivo $nome_arquivo criado!');
                    window.location.href = 'monitorias.php';
                </script>";
                exit();
            } else {
                echo "
                <script>
                    alert('Monitoria adicionada, mas houve um erro ao criar o arquivo.');
                    window.location.href = 'monitorias.php';
                </script>";
                exit();
            }
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
} else {
    echo "
    <script>
        alert('');
        window.location.href = 'adicionar.php';
    </script>";
    exit();
}

// Fecha a conexão
$conn->close();
?>
