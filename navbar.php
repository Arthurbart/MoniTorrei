<!-- Navbar -->
<nav class="navbar navbar-light bg-light px-3">
  <div class="d-flex align-items-center">
    <!-- Botão de Menu -->
    <button class="btn btn-outline-secondary me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
      <i class="bi bi-list"></i>
    </button>
    <a class="navbar-brand" href="monitorias.php">
      <img src="imgs/mini_logo_iffar_c.png" alt="Logo Instituto Federal" width="30px" height="30px">
      MoniTorrei
    </a>
  </div>
  <!-- Ícone de Perfil -->
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-decoration-none" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
      <?php echo $_SESSION['nome_usuario']; ?><i class="ms-3 bi bi-person-circle" style="font-size: 1.5rem;"></i>
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
      <?php
      // Consulta para buscar monitorias ativas
      $sql = "SELECT nome FROM monitorias WHERE status = 'ativo'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Loop para criar os itens do menu dinamicamente
        while ($row = $result->fetch_assoc()) {
          $nomeMonitoria = htmlspecialchars($row['nome']);
          echo "<a href='".strtolower($nomeMonitoria).".php' class='text-decoration-none'>
                  <li class='list-group-item'>$nomeMonitoria</li>
                </a>";
        }
      } else {
        echo "<li class='list-group-item text-muted'>Nenhuma monitoria ativa</li>";
      }
      ?>
    </ul>
  </div>
</div>
