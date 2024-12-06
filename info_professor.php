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

        <ul class="nav nav-tabs" id="monitoriaTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="comentarios-tab" data-bs-toggle="tab" data-bs-target="#comentarios" type="button" role="tab" aria-controls="comentarios" aria-selected="true">Comentários</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="presenca-tab" data-bs-toggle="tab" data-bs-target="#presenca" type="button" role="tab" aria-controls="presenca" aria-selected="false">Lista de Presença</button>
          </li>
        </ul>
        <div class="tab-content mt-3" id="monitoriaTabsContent">
          <!-- Comentários -->
          <div class="tab-pane fade show active" id="comentarios" role="tabpanel" aria-labelledby="comentarios-tab">

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
                        Nenhum comentario foi feito para esta monitoria ainda.
                    </div>
                    ";
                }
            ?>
          </div>
          <!-- Lista de presença -->
          <div class="tab-pane fade show active" id="presenca" role="tabpanel" aria-labelledby="presenca-tab">

          </div>
