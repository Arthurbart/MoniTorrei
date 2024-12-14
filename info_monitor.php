  <!-- Banner -->
  <div class="banner">
    <div class="container py-4">
      <div class="pt-4">
        <?php echo "<h1>$nome_monitoria</h1>"; ?>
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
            <?php echo "<p class='card-text'>$monitor_nome</p>"; ?>
            <h5 class="card-title">Curso Técnico</h5>
            <?php echo "<p class='card-text'>$curso</p>"; ?>
            <h5 class="card-title">Local</h5>
            <?php echo "<p class='card-text'>$sala</p>"; ?>
            <h5 class="card-title">Horário</h5>
            <?php echo "<p class='card-text pt-0 mt-0'>$dias</p>"; ?>
            <?php echo "<p class='card-text pt-0 mt-0'>$horario</p>"; ?>
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
                                <div class='d-flex justify-content-between mb-2'>
                                    <div class='d-flex'>
                                        <img src='imgs/menina.png' alt='Monitor' class='rounded-circle me-2' width='40' height='40'>
                                        <div>
                                          <h6 class='card-title mb-0'>$monitor_nome</h6>
                                          <small class='text-muted'>$data_aviso</small>
                                        </div>
                                    </div>
                                    <div class='dropdown'>
                                      <button class='btn btn-sm btn-light dropdown-toggle' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'>
                                        <i class='bi bi-three-dots'></i>
                                      </button>
                                      <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='dropdownMenuButton'>
                                        <li>
                                          <form action='excluir_aviso.php' method='POST' style='margin: 0;'>
                                            <input type='hidden' name='aviso_id' value='$aviso_id'>
                                            <button class='dropdown-item text-danger' type='submit' onclick=\"return confirm('Tem certeza que deseja excluir este aviso?');\">Excluir Aviso</button>
                                          </form>
                                        </li>
                                      </ul>
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
                        Nenhum aviso foi feito para esta monitoria ainda.
                    </div>
                    ";
            }
            ?>
          </div>

          <!-- Arquivos -->
          <div class="tab-pane fade" id="arquivos" role="tabpanel" aria-labelledby="arquivos-tab">

            <!-- ADICIONA UM ARQUIVO -->
            <div class="mb-3">
              <form action="processa_arquivo.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <!-- Explicação do arquivo -->
                  <div class="col-12 mb-3">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-person"></i></span>
                      <input type="text" class="form-control" name="explicacao" placeholder="Postar um arquivo para a monitoria - Descrição da Postagem" required>
                    </div>
                  </div>

                  <!-- Input de arquivo -->
                  <div class="col-12 mb-3">
                    <input type="file" class="form-control" name="arquivo" required>
                  </div>

                  <!-- Tipo de arquivo -->
                  <div class="col-12 mb-3">
                    <select class="form-select" name="tipo" required>
                      <option selected disabled>Selecione</option>
                      <option value="Conteúdo">Conteúdo</option>
                      <option value="Atividade">Atividade</option>
                    </select>
                  </div>

                  <!-- Botão de envio -->
                  <div class="col-12">
                    <button type="submit" class="btn btn-secondary w-100">Enviar</button>
                  </div>
                </div>
              </form>
            </div>

            <?php
            // Consulta para pegar os documentos da monitoria
            $sql_documentos = "SELECT d.id, d.descricao, d.doc, d.tipo, d.data_postagem, u.nome as usuario_nome 
                          FROM documentos d
                          JOIN usuario u ON d.usuario_id = u.id
                          WHERE d.monitoria_id = '$id_monitoria'
                          ORDER BY d.data_postagem DESC";

            $result_documentos = $conn->query($sql_documentos);

            if ($result_documentos && $result_documentos->num_rows > 0) {
              while ($documento = $result_documentos->fetch_assoc()) {
                $id_documento = htmlspecialchars($documento['id']);
                $descricao = htmlspecialchars($documento['descricao']);
                $doc = htmlspecialchars($documento['doc']);
                $tipo = htmlspecialchars($documento['tipo']);
                $data_postagem = $documento['data_postagem'] ? date('d/m/Y', strtotime($documento['data_postagem'])) : 'Data inválida';
                $usuario_nome = htmlspecialchars($documento['usuario_nome']);

                // Define a cor do badge de acordo com o tipo
                $badge_class = $tipo == 'Atividade' ? 'bg-danger' : 'bg-primary';

                // Exibe o card do documento
                echo "
                    <div class='card mb-3'>
                        <div class='card-body'>
                            <div class='d-flex justify-content-between mb-2'>
                                <div class='d-flex align-itens-center mb-2'>
                                    <img src='imgs/menina.png' alt='Monitor' class='rounded-circle me-2' width='40' height='40'>
                                    <div>
                                      <h6 class='card-title mb-0'>$usuario_nome</h6>
                                      <small class='text-muted'>$data_postagem</small>
                                    </div>
                                </div>
                                <div class='dropdown'>
                                  <button class='btn btn-sm btn-light dropdown-toggle' type='button' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='bi bi-three-dots'></i>
                                  </button>
                                  <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='dropdownMenuButton'>
                                    <li>
                                      <form action='excluir_arquivo.php' method='POST' style='margin: 0;'>
                                        <input type='hidden' name='arquivo_id' value='$id_documento'>
                                        <button class='dropdown-item text-danger' type='submit' onclick=\"return confirm('Tem certeza que deseja excluir este arquivo?');\">Excluir Arquivo</button>
                                      </form>
                                    </li>
                                  </ul>
                                </div>
                            </div>

                            <p class='card-text'>$descricao</p>
                            <div class='d-flex align-items-center'>
                                <i class='bi bi-file-earmark-pdf fs-4 text-danger me-2'></i>
                                <a href='uploads/$doc' class='text-decoration-none' target='_blank'>$doc</a>
                            </div>
                            <span class='badge $badge_class mt-2'>$tipo</span>
                        </div>
                    </div>
                    ";
              }
            } else {
              echo "
                    <div class='alert alert-info' role='alert'>
                        Nenhum documento foi enviado para esta monitoria ainda.
                    </div>
                ";
            }
            ?>

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
                $pedinte_id = htmlspecialchars($pedido['usuario_id']);
                $pedido_id = htmlspecialchars($pedido['id']);
                $conteudo = htmlspecialchars($pedido['conteudo']);
                $data_pedido = $pedido['data_pedido'] ? date('d/m/Y', strtotime($pedido['data_pedido'])) : 'Data inválida';
                $status = htmlspecialchars($pedido['status']);

                $sql_pedinte = "SELECT nome
                        FROM usuario 
                        WHERE id = '$pedinte_id'
                        ORDER BY id DESC";
                $result_pedinte = $conn->query($sql_pedinte);
                $pedinte_nome = $result_pedinte->fetch_assoc()['nome'];

                echo "
                        <div class='container mt-4'>
                            <div class='card card-pedido mb-4'>
                                <div class='card-body'>
                                    <div class='d-flex justify-content-between mb-2'>
                                        <div>
                                            <i class='bi bi-person pe-3'></i>
                                            <strong>$pedinte_nome</strong>
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

          <div class="tab-pane fade" id="chamada" role="tabpanel" aria-labelledby="chamada-tab">

            <div class="d-flex justify-content-center">
              <div class="col-6">
                <!-- Botão para abrir o modal -->
                <button class="btn btn-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#monitoriaModal">
                  Nova Monitoria
                </button>
              </div>
            </div>

            <div class="container mt-3">
              <?php
              $query_dias = "SELECT DISTINCT data_presenca FROM presencas WHERE monitoria_id = ? ORDER BY data_presenca DESC";
              $stmt_dias = $conn->prepare($query_dias);

              if ($stmt_dias) {
                $stmt_dias->bind_param('i', $id_monitoria);
                $stmt_dias->execute();

                $result_dias = $stmt_dias->get_result();
                if ($result_dias) {
                  $dias_monitoria = [];
                  while ($row = $result_dias->fetch_assoc()) {
                    $dias_monitoria[] = $row['data_presenca'];
                  }


                  $stmt_dias->close();
                } else {
                  echo "Erro ao obter os dias de monitoria.";
                  exit();
                }
              } else {
                echo "Erro ao preparar a consulta para buscar os dias de monitoria.";
                exit();
              }
              if (!empty($dias_monitoria)) {
                foreach ($dias_monitoria as $dia) {
                  $dia_formatado = date('d/m/Y', strtotime($dia));
                  echo "<div class='card mb-3'>
                            <div class='card-header'>
                                <strong>Monitoria do dia " . htmlspecialchars($dia_formatado) . "</strong>
                                <!-- Dropdown para excluir o dia inteiro -->
                                <div class='dropdown float-end'>
                                    <button class='btn btn-sm btn-danger dropdown-toggle' type='button' id='dropdownMenuButtonDia' data-bs-toggle='dropdown' aria-expanded='false'>
                                        <i class='bi bi-trash'></i>
                                    </button>
                                    <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='dropdownMenuButtonDia'>
                                        <li>
                                            <form action='remover_dia.php' method='POST' style='margin: 0;'>
                                                <input type='hidden' name='dia_presenca' value='" . htmlspecialchars($dia) . "'>
                                                <input type='hidden' name='monitoria_id' value='" . htmlspecialchars($id_monitoria) . "'>
                                                <button class='dropdown-item text-danger' type='submit' onclick=\"return confirm('Tem certeza que deseja excluir toda a chamada deste dia?');\">
                                                    Excluir Dia Inteiro
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class='card-body'>";

                  $query_alunos = "SELECT u.id, u.nome, u.matricula FROM presencas p 
                                     INNER JOIN usuario u ON p.usuario_id = u.id 
                                     WHERE p.monitoria_id = ? AND p.data_presenca = ?";
                  $stmt_alunos = $conn->prepare($query_alunos);

                  if ($stmt_alunos) {
                    $stmt_alunos->bind_param('is', $id_monitoria, $dia);
                    $stmt_alunos->execute();
                    $result_alunos = $stmt_alunos->get_result();

                    if ($result_alunos) {
                      echo "<ul class='list-group'>";
                      while ($aluno = $result_alunos->fetch_assoc()) {
                        echo "<li class='list-group-item'>" . htmlspecialchars($aluno['nome']) . " (" . htmlspecialchars($aluno['matricula']) . ")";

                        // Dropdown para remover aluno da chamada
                        echo "<div class='dropdown float-end'>
                                        <button class='btn btn-sm btn-light dropdown-toggle' type='button' id='dropdownMenuButtonAluno' data-bs-toggle='dropdown' aria-expanded='false'>
                                            <i class='bi bi-three-dots'></i>
                                        </button>
                                        <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='dropdownMenuButtonAluno'>
                                            <li>
                                                <form action='remover_aluno.php' method='POST' style='margin: 0;'>
                                                    <input type='hidden' name='aluno_id' value='" . htmlspecialchars($aluno['id']) . "'>
                                                    <input type='hidden' name='dia_presenca' value='" . htmlspecialchars($dia) . "'>
                                                    <button class='dropdown-item text-danger' type='submit' onclick=\"return confirm('Tem certeza que deseja remover este aluno da chamada?');\">
                                                        Remover Aluno
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                      </div>";

                        echo "</li>";
                      }
                      echo "</ul>";
                      $stmt_alunos->close();
                    } else {
                      echo "Erro ao buscar alunos presentes.";
                    }
                  } else {
                    echo "Erro ao preparar a consulta para buscar alunos.";
                  }

                  echo "<button class='btn btn-success mt-3' data-bs-toggle='modal' 
                            data-bs-target='#addAlunoModal' 
                            data-dia='" . htmlspecialchars($dia) . "'>
                                Adicionar Aluno
                          </button>
                        </div>
                    </div>";
                }
              } else {
                echo "<div class='alert alert-info'>Nenhuma monitoria encontrada.</div>";
              }
              ?>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="monitoriaModal" tabindex="-1" aria-labelledby="monitoriaModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="monitoriaModalLabel">Nova Monitoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- Formulário dentro do modal -->
                    <form method="POST" action="processa_chamada.php">
                      <div class="form-group">
                        <label for="data">Data</label>
                        <input type="date" class="form-control" id="data" name="data" required>
                      </div>
                      <div class="form-group">
                        <label for="matriculaMonitor">Matrícula do Aluno</label>
                        <input type="text" class="form-control" id="matriculaMonitor" name="matricula_monitor" placeholder="Digite a matrícula do monitor" onblur="buscarNome()" required>
                      </div>
                      <div class="form-group">
                        <label for="nomeMonitor">Nome do Aluno</label>
                        <input type="text" class="form-control" id="nomeMonitor" name="nome_monitor" placeholder="Nome do aluno" readonly required>
                      </div>
                      <div class="form-group">
                        <label for="comentario">Feedback do Aluno</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="4" required></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar Novo Dia</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal para adicionar aluno -->
            <div class="modal fade" id="addAlunoModal" tabindex="-1" aria-labelledby="addAlunoLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <form method="POST" action="processa_chamada.php">
                      <div class="modal-header">
                        <h5 class="modal-title" id="addAlunoLabel">Adicionar Aluno</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <input type="hidden" name="data" id="dataMonitoria">
                      <div class="form-group">
                        <label for="matriculaMonitor">Matrícula do Aluno</label>
                        <input type="text" class="form-control" id="matriculaMonitor" name="matricula_monitor" placeholder="Digite a matrícula do monitor" onblur="buscarNome()" required>
                      </div>
                      <div class="form-group">
                        <label for="nomeMonitor">Nome do Aluno</label>
                        <input type="text" class="form-control" id="nomeMonitor" name="nome_monitor" placeholder="Nome do aluno" readonly required>
                      </div>
                      <div class="form-group">
                        <label for="comentario">Feedback do Aluno</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="4" required></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar Novo Dia</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>
      <script>
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
      <script>
        // Preencher o campo de data no modal
        var addAlunoModal = document.getElementById('addAlunoModal');
        addAlunoModal.addEventListener('show.bs.modal', function(event) {
          var button = event.relatedTarget; // Botão que abriu o modal
          var data = button.getAttribute('data-dia'); // Obter a data associada
          var inputData = document.getElementById('dataMonitoria'); // Campo hidden no modal
          inputData.value = data; // Definir o valor do campo
        });
      </script>