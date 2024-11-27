  <!-- Banner -->
  <div class="banner">
    <div class="container py-4">
      <div class="pt-4">
        <?php echo"<h1>Programação</h1>";?>
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