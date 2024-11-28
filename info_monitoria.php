  <!-- Banner -->
  <div class="banner">
    <div class="container py-4">
      <div class="pt-4">
        <?php echo"<h1>$nome_monitoria</h1>";?>
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
            <?php echo"<p class='card-text'>$monitor_nome</p>"; ?>
            <h5 class="card-title">Curso Técnico</h5>
            <?php echo"<p class='card-text'>$curso</p>"; ?>
            <h5 class="card-title">Local</h5>
            <?php echo"<p class='card-text'>$sala</p>"; ?>
            <h5 class="card-title">Horário</h5>
            <?php echo"<p class='card-text pt-0 mt-0'>$dias</p>"; ?>
            <?php echo"<p class='card-text pt-0 mt-0'>$horario</p>"; ?>
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
            <!-- Seção de Pedido de Conteúdo -->
            <div class="mb-3">
              <form action="processa_pedido.php" method="POST">
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-person"></i></span>
                  <input type="text" class="form-control" name="pedido" placeholder="Solicitar conteúdo / material específico..." required>
                  <button type="submit" class="form-control">Enviar</button>
                </div>
              </form>
            </div>
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