<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MoniTorrei - Monitorias</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
  <style>
    /* Estilo do layout dos cards */
    .card {
      border-radius: 15px;
      overflow: hidden;
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: bold;
    }

    .card-text {
      margin-bottom: 0.5rem;
    }

    /* Adicionando estilo para o menu lateral */
    .offcanvas-start {
      background-color: #f8f9fa;
      width: 250px;
    }

    .offcanvas-body {
      padding: 20px;
    }

    /* Estilo para o dropdown do ícone do perfil */
    .dropdown-menu-end {
      right: 0;
      left: auto;
    }

    .dropdown-item.text-danger {
      color: red !important;
    }

    .btn-redondo {
      border-radius: 50%;
      position: fixed;
      top: 85%;
      left: 92%;
      width: 50px;
      height: 50px;
    }
  </style>
</head>
<body>
  <?php 
    include('conexao.php');
    include('navbar.php');

    $sql = "
      SELECT 
        m.id, 
        m.nome, 
        m.horario, 
        m.sala, 
        m.curso, 
        u.nome AS usuario_nome 
      FROM monitorias m
      JOIN usuario u ON m.usuario_id = u.id
      WHERE m.status = 'ativo'
    ";
    $result = $conn->query($sql);
    ?>

    <!-- Conteúdo da Página -->
    <div class="container mt-4">
        <div class="row">
            <?php
              // Verifica se há resultados e cria os cards
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    
                    echo"<div class='col-3'>
                          <a href='" . urlencode($row['nome']). ".php' class='text-decoration-none'>
                              <div class='card shadow-sm'>
                                <img src='imgs/mesa-estudos.png' class='card-img-top' alt='Programação' style='opacity: 0.7;'>
                                <div class='card-body'>
                                  <h5 class='card-title'>" . htmlspecialchars($row['nome']) . "</h5>
                                  <p class='card-text text'>Monitor: ". htmlspecialchars($row['usuario_nome']) ."</p>
                                  <p class='text-muted'>" . htmlspecialchars($row['curso']) . "</p>
                                </div>
                              </div>
                          </a>
                        </div>
                    ";
                  }
              } else {
                  echo '<p class="text-muted">Nenhuma monitoria ativa disponível no momento.</p>';
              }
              // Fecha a conexão
              $conn->close();
            ?>
        </div>
    </div>
      
    <?php
      if ($_SESSION['cargo'] == 3){
        echo "<a href='adicionar.php'><button class='btn btn-dark btn-round btn-redondo'>&#10010;</button></a>";
      }
    ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
