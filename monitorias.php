<?php
  session_start();
  if (!isset($_SESSION['usuario_id'])) {
    echo"
    <script>
    alert('Você não está logado, direcionando para página de login...');
    window.location.href = 'index.html';
    </script>";
    exit;
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MoniTorrei - Monitorias</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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

    .quimica {
      color: #e91e63;
    }

    .fisica {
      color: #3f51b5;
    }

    .programacao {
      color: #9c27b0;
    }

    .redes {
      color: #ffc107;
    }

    .marketing {
      color: #009688;
    }

    .biologia {
      color: #ff9800;
    }

    .matematica {
      color: #f44336;
    }

    .matematica-financeira {
      color: #8bc34a;
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
  <!-- Navbar -->
  <nav class="navbar navbar-light bg-light px-3">
    <div class="d-flex align-items-center">
      <!-- Botão de Menu -->
      <button class="btn btn-outline-secondary me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
        <i class="bi bi-list"></i>
      </button>
      <a class="navbar-brand" href="#">
        <img src="imgs/mini_logo_iffar_c.png" alt="Logo Instituto Federal" width="30" height="30">
        MoniTorrei
      </a>
    </div>
    <!-- Ícone de Perfil -->
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-decoration-none" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo $_SESSION['nome']; ?><i class="ms-3 bi bi-person-circle" style="font-size: 1.5rem;"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
        <li><a class="dropdown-item text-danger" href="logout.php">Sair da conta</a></li>
      </ul>
    </div>
  </nav>

  <!-- Menu Lateral (Offcanvas) -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasMenuLabel">Monitorias</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="list-group">
      <a href="programacao.php">
            <li class="list-group-item">Programação</li>
        </a>      
      </ul>
    </div>
  </div>

  <!-- Conteúdo da Página -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-3">
        <!-- Card Programação -->
        <a href="programacao.php" class="text-decoration-none">
            <div class="card shadow-sm">
              <img src="imgs/mesa-estudos.png" class="card-img-top" alt="Programação" style="opacity: 0.7;">
              <div class="card-body">
                <h5 class="card-title programacao">Programação</h5>
                <p class="card-text text">Nome do Monitor</p>
                <p class="text-muted">Exclusivo Informática</p>
              </div>
            </div>
        </a>
      </div>
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
