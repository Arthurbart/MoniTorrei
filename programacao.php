<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Monitoria - Programação</title>
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
      <?php session_start(); echo $_SESSION['nome']; ?><i class="ms-3 bi bi-person-circle" style="font-size: 1.5rem;"></i>
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

  <!-- Banner -->
  <div class="banner">
    <div class="container py-4">
      <div class="pt-4">
        <h1>Programação</h1>
        <p>Instituto Federal Farroupilha</p>
      </div>
      <img src="imgs/menina.png" alt="Monitor">
    </div>
  </div>

  <!-- Informações da Monitoria -->
  <div class="container my-4">
    <div class="row">
      <div class="col-md-3">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title">Monitor</h5>
            <p class="card-text">Nome do Monitor</p>
            <h5 class="card-title">Local</h5>
            <p class="card-text">Sala G6</p>
            <h5 class="card-title">Horário</h5>
            <p class="card-text pb-1 mb-1">Segunda, terça e quinta</p>
            <p class="card-text pt-0 mt-0">12:45 PM</p>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <!-- Tabs de Comentários, Arquivos e Meus Pedidos -->
        <ul class="nav nav-tabs" id="monitoriaTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="comentarios-tab" data-bs-toggle="tab" data-bs-target="#comentarios" type="button" role="tab" aria-controls="comentarios" aria-selected="true">Comentários</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="arquivos-tab" data-bs-toggle="tab" data-bs-target="#arquivos" type="button" role="tab" aria-controls="arquivos" aria-selected="false">Arquivos</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="meus-pedidos-tab" data-bs-toggle="tab" data-bs-target="#meus-pedidos" type="button" role="tab" aria-controls="meus-pedidos" aria-selected="false">Meus Pedidos</button>
          </li>
        </ul>
        <div class="tab-content mt-3" id="monitoriaTabsContent">
          <!-- Comentários -->
          <div class="tab-pane fade show active" id="comentarios" role="tabpanel" aria-labelledby="comentarios-tab">
            <!-- Seção de Pedido de Conteúdo -->
            <div class="mb-3">
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" placeholder="Solicitar conteúdo / material específico...">
              </div>
            </div>
    
            <!-- Card de Avisos -->
            <div class="card mb-3">
              <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                  <img src="imgs/menina.png" alt="Monitor" class="rounded-circle me-2" width="40" height="40">
                  <div>
                    <h6 class="card-title mb-0">Nome do Monitor</h6>
                    <small class="text-muted">07:38 AM</small>
                  </div>
                </div>
                <p class="card-text">Bom dia! Vou me atrasar um pouquinho hoje, começamos 12:50 PM. :)</p>
              </div>
            </div>
    
            <!-- Outro Card de Avisos -->
            <div class="card mb-3">
              <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                  <img src="imgs/menina.png" alt="Monitor" class="rounded-circle me-2" width="40" height="40">
                  <div>
                    <h6 class="card-title mb-0">Nome do Monitor</h6>
                    <small class="text-muted">07/10/24</small>
                  </div>
                </div>
                <p class="card-text">Bom dia, pessoal! Não vou poder comparecer hoje, fica para terça-feira.</p>
              </div>
            </div>
          </div>
          <!-- Arquivos -->
          <div class="tab-pane fade" id="arquivos" role="tabpanel" aria-labelledby="arquivos-tab">
            <div class="card mb-3">
              <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                  <img src="imgs/menina.png" alt="Monitor" class="rounded-circle me-2" width="40" height="40">
                  <div>
                    <h6 class="card-title mb-0">Nome do Monitor</h6>
                    <small class="text-muted">01/10/24</small>
                  </div>
                </div>
                <p class="card-text">Em anexo, as atividades de PHP.</p>
                <div class="d-flex align-items-center">
                  <i class="bi bi-file-earmark-pdf fs-4 text-danger me-2"></i>
                  <a href="#" class="text-decoration-none">atividades_php.pdf</a>
                </div>
                <span class="badge bg-danger mt-2">Atividade</span>
              </div>
            </div>
        
            <!-- Outro Card de Arquivo -->
            <div class="card mb-3">
              <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                  <img src="imgs/menina.png" alt="Monitor" class="rounded-circle me-2" width="40" height="40">
                  <div>
                    <h6 class="card-title mb-0">Nome do Monitor</h6>
                    <small class="text-muted">07/10/24</small>
                  </div>
                </div>
                <p class="card-text">Boa tarde pessoal! Conforme falei na monitoria, aqui está disponível o documento da documentação do software comentado.</p>
                <div class="d-flex align-items-center">
                  <i class="bi bi-file-earmark-pdf fs-4 text-danger me-2"></i>
                  <a href="#" class="text-decoration-none">documentacao.docx</a>
                </div>
                <span class="badge bg-primary mt-2">Conteúdo</span>
              </div>
            </div>
          </div>
        
          </div>
          <!-- Meus Pedidos -->
          <div class="tab-pane fade" id="meus-pedidos" role="tabpanel" aria-labelledby="meus-pedidos-tab">
            <!-- Exemplo de pedido -->
            <div class="container mt-4">
              <div class="card card-pedido mb-4">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-person pe-3"></i>
                    <strong class="me-auto">Você</strong>
                    <div class="dropdown">
                      <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Editar</a></li>
                        <li><a class="dropdown-item text-danger" href="#">Excluir</a></li>
                      </ul>
                    </div>
                  </div>
                  <p class="card-text">Oi! Será que você poderia falar sobre Java na próxima monitoria? Se não conseguir, tudo bem. Agradeço desde já.</p>
                  
                  <div class="d-flex align-items-start mb-3">
                    <div class="d-flex flex-column">
                      <div class="d-flex align-items-center">
                        <img src="imgs/menina.png" alt="Monitor" class="rounded-circle me-2" width="30" height="30">
                        <strong class="me-2">Monitor respondeu:</strong>
                      </div>
                      <span class="pt-3">Olá! Você gostaria de aprender um conteúdo específico de JAVA?</span>
                    </div>
                    
                    <!-- Botão para mostrar a caixa de resposta, alinhado à direita -->
                    <button class="btn btn-link ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#respostaForm" aria-expanded="false" aria-controls="respostaForm">
                      <i class="bi bi-arrow-return-left"></i>
                    </button>
                  </div>
                  
                  <!-- Caixa de resposta oculta que aparece ao clicar no botão -->
                  <div class="collapse" id="respostaForm">
                    <div class="input-group mt-2">
                      <input type="text" class="form-control" placeholder="Digite sua resposta...">
                      <button class="btn btn-primary" type="button">Enviar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container mt-4">
              <div class="card card-pedido mb-4">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-person pe-3"></i>
                    <strong class="me-auto">Você</strong>
                    <div class="dropdown">
                      <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Editar</a></li>
                        <li><a class="dropdown-item text-danger" href="#">Excluir</a></li>
                      </ul>
                    </div>
                  </div>
                  <p class="card-text">oii, você poderia ver para mim algumas questões sobre PHP, vou ter prova semana que vem e queria estar sabendo...</p>
                  
                  <div class="d-flex align-items-start mb-3">
                    <div class="d-flex flex-column">
                      <div class="d-flex align-items-center">
                        <img src="imgs/menina.png" alt="Monitor" class="rounded-circle me-2" width="30" height="30">
                        <strong class="me-2">Monitor respondeu:</strong>
                      </div>
                      <span class="pt-3">Olá! Pode deixar!</span>
                    </div>
                    
                    <!-- Botão para mostrar a caixa de resposta, alinhado à direita -->
                    <button class="btn btn-link ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#respostaForm1" aria-expanded="false" aria-controls="respostaForm">
                      <i class="bi bi-arrow-return-left"></i>
                    </button>
                  </div>
                  
                  <!-- Caixa de resposta oculta que aparece ao clicar no botão -->
                  <div class="collapse" id="respostaForm1">
                    <div class="input-group mt-2">
                      <input type="text" class="form-control" placeholder="Digite sua resposta...">
                      <button class="btn btn-primary" type="button">Enviar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>