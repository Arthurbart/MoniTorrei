<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Monitoria</title>
    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">    
    <style>

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
    <script>
        // Função para buscar o nome do monitor com base na matrícula
        function buscarNome() {
            const matricula = document.getElementById('matriculaMonitor').value;

            if (matricula) {
                fetch(`buscar_monitor.php?matricula=${matricula}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.sucesso) {
                            document.getElementById('nomeMonitor').value = data.nome;
                        } else {
                            alert('Matrícula não encontrada!');
                            document.getElementById('nomeMonitor').value = '';
                        }
                    })
                    .catch(error => {
                        console.error('Erro na busca:', error);
                    });
            } else {
                document.getElementById('nomeMonitor').value = '';
            }
        }
    </script>
</head>
<body>
    <?php session_start(); ?>
      <!-- Navbar -->
  <nav class="navbar navbar-light bg-light px-3">
    <div class="d-flex align-items-center">
      <!-- Botão de Menu -->
      <button class="btn btn-outline-secondary me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
        <i class="bi bi-list"></i>
      </button>
      <a class="navbar-brand" href="monitorias.php">
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
    <div class="container mt-5">
        <h1 class="text-center mb-4">Adicionar Monitoria</h1>
        <form action="processa_monitoria.php" method="POST">
            <!-- Nome da monitoria -->
            <div class="mb-3">
                <label for="nomeMonitoria" class="form-label">Nome da Monitoria</label>
                <input type="text" class="form-control" id="nomeMonitoria" name="nome_monitoria" placeholder="Digite o nome da monitoria" required>
            </div>
            <!-- Matrícula do monitor -->
            <div class="mb-3">
                <label for="matriculaMonitor" class="form-label">Matrícula do Monitor</label>
                <input type="text" class="form-control" id="matriculaMonitor" name="matricula_monitor" placeholder="Digite a matrícula do monitor" onblur="buscarNome()" required>
            </div>
            <!-- Nome do monitor (preenchido automaticamente) -->
            <div class="mb-3">
                <label for="nomeMonitor" class="form-label">Nome do Monitor</label>
                <input type="text" class="form-control" id="nomeMonitor" name="nome_monitor" placeholder="Nome do monitor" readonly required>
            </div>
            <!-- Horário -->
            <div class="mb-3">
                <label for="horario" class="form-label">Horário</label>
                <input type="time" class="form-control" id="horario" name="horario" required>
            </div>
            <!-- Local -->
            <div class="mb-3">
                <label for="local" class="form-label">Local</label>
                <input type="text" class="form-control" id="local" name="local" placeholder="Digite o local da monitoria" required>
            </div>
            <!-- Curso -->
            <div class="mb-3">
                <label for="curso" class="form-label">Curso</label>
                <select class="form-select" id="curso" name="curso" required>
                    <option value="todos" selected>Todos os cursos</option>
                    <option value="administracao">Administração</option>
                    <option value="alimentos">Alimentos</option>
                    <option value="agropecuaria">Agropecuária</option>
                    <option value="informatica">Informática</option>
                </select>
            </div>
            <!-- Botão de envio -->
            <button type="submit" class="btn btn-primary w-100">Adicionar Monitoria</button>
        </form>
    </div>

    <!-- Link para o Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
