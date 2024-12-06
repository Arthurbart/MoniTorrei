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
            <button class="nav-link" id="meus-pedidos-tab" data-bs-toggle="tab" data-bs-target="#meus-pedidos" type="button" role="tab" aria-controls="meus-pedidos" aria-selected="false">Pedidos</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="chamada-tab" data-bs-toggle="tab" data-bs-target="#chamada" type="button" role="tab" aria-controls="chamada" aria-selected="false">Chamada</button>
          </li>
        </ul>
        <div class="tab-content mt-3" id="monitoriaTabsContent">
          <!-- Comentários -->
          <div class="tab-pane fade show active" id="comentarios" role="tabpanel" aria-labelledby="comentarios-tab">

            <!-- ADICIONA UM COMENTARIO -->
            <div class="mb-3">
                <form action="processa_aviso.php" method="POST">
                    <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" name="aviso" placeholder="Postar aviso da monitoria" required>
                    <button type="submit" class="form-control">Enviar</button>
                    </div>
                </form>
            </div>
            <?php
                $sql_avisos = "SELECT id, conteudo, data_aviso, usuario_id 
                                FROM avisos 
                                WHERE monitoria_id = '$id_monitoria'
                                ORDER BY id DESC";

                $result_avisos = $conn->query($sql_avisos);

                if ($result_avisos && $result_avisos->num_rows > 0) {
                    while ($aviso = $result_avisos->fetch_assoc()) {
                        $aviso_id = htmlspecialchars($aviso['id']);
                        $conteudo = htmlspecialchars($aviso['conteudo']);
                        $data_aviso = $aviso['data_aviso'] ? date('d/m/Y', strtotime($aviso['data_aviso'])) : 'Data inválida';

                        echo "
                        <div class='card mb-3'>
                            <div class='card-body'>
                                <div class='d-flex align-items-center mb-2'>
                                    <img src='imgs/menina.png' alt='Monitor' class='rounded-circle me-2' width='40' height='40'>
                                    <div>
                                        <h6 class='card-title mb-0'>$monitor_nome</h6>
                                        <small class='text-muted'>$data_aviso</small>
                                    </div>
                                </div>
                                <p class='card-text'>$conteudo</p>
                            </div>
                        </div>
                        ";
                    }
                } else {
                    echo "
                    <div class='alert alert-info' role='alert'>
                        Nenhum pedido foi feito para esta monitoria ainda.
                    </div>
                    ";
                }
            ?>
          </div>
            <!-- Arquivos -->

          <div class="tab-pane fade" id="arquivos" role="tabpanel" aria-labelledby="arquivos-tab">

            <!-- ADICIONA UM arquivo -->
            <div class="mb-3">
                <form action="processa_arquivo.php" method="POST">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" name="explicacao" placeholder="Postar um arquivo para a monitoria" required>
                        <input type="file" class="form-control" name="arquivo" required>
                        <select class="form-select" name="tipo" required>
                        <option selected disabled>Selecione</option>
                        <option value="Conteúdo">Conteúdo</option>
                        <option value="Atividade">Atividade</option>
                    </select>                        
                    <button type="submit" class="form-control">Enviar</button>
                    </div>
                </form>
            </div>

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

          <!-- PEDIDOS -->

          <div class="tab-pane fade" id="meus-pedidos" role="tabpanel" aria-labelledby="meus-pedidos-tab">
            <?php
                $sql_pedidos = "SELECT id, conteudo, data_pedido, status, usuario_id 
                                FROM pedidos_conteudo 
                                WHERE monitoria_id = '$id_monitoria'
                                ORDER BY id DESC";

                $result_pedidos = $conn->query($sql_pedidos);

                if ($result_pedidos && $result_pedidos->num_rows > 0) {
                    while ($pedido = $result_pedidos->fetch_assoc()) {
                        $pedido_id = htmlspecialchars($pedido['id']);
                        $conteudo = htmlspecialchars($pedido['conteudo']);
                        $data_pedido = $pedido['data_pedido'] ? date('d/m/Y', strtotime($pedido['data_pedido'])) : 'Data inválida';
                        $status = htmlspecialchars($pedido['status']);

                        echo "
                        <div class='container mt-4'>
                            <div class='card card-pedido mb-4'>
                                <div class='card-body'>
                                    <div class='d-flex justify-content-between mb-2'>
                                        <div>
                                            <i class='bi bi-person pe-3'></i>
                                            <strong>Você</strong>
                                            <br>
                                            <small class='text-muted'>$data_pedido</small>
                                        </div>
                                        <div class='d-flex'>
                                            <form action='atualizar_pedido.php' method='POST' class='me-2'>
                                                <input type='hidden' name='pedido_id' value='$pedido_id'>
                                                <input type='hidden' name='status' value='Aceito'>
                                                <button type='submit' class='btn btn-success btn-sm'>Aceitar</button>
                                            </form>
                                            <form action='atualizar_pedido.php' method='POST'>
                                                <input type='hidden' name='pedido_id' value='$pedido_id'>
                                                <input type='hidden' name='status' value='Negado'>
                                                <button type='submit' class='btn btn-danger btn-sm'>Negar</button>
                                            </form>
                                        </div>
                                    </div>
                                    <p class='card-text'>$conteudo</p>
                                    <span class='badge bg-info'>$status</span>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                } else {
                    echo "
                    <div class='alert alert-info' role='alert'>
                        Nenhum pedido foi feito para esta monitoria ainda.
                    </div>
                    ";
                }
            ?>
        </div>


      </div>
    </div>
  </div>