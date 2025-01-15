<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MoniTorrei - Monitorias</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
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

    <div class="container mt-4">
        <div class="row">
            <?php
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    
                    echo"<div class='col-6 col-md-3 pt-3'>
                          <a href='monitoria.php?id=" . htmlspecialchars($row['id']) . "' class='text-decoration-none'>
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
              $conn->close();
            ?>
        </div>
    </div>
      
    <?php
      if ($_SESSION['cargo'] == 'admin'){
        echo "<a href='adicionar.php'><button class='btn btn-dark btn-round btn-redondo'>&#10010;</button></a>";
      }
    ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
