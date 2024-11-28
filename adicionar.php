<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Monitoria</title>
    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">    
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
  <?php 
    include('conexao.php');
    include('navbar.php');
  ?>
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
            <!-- dias -->
            <div class="mb-3">
                <label for="dias" class="form-label">Dias de Funcionamento</label>
                <input type="text" class="form-control" id="dias" name="dias" placeholder="Digite os dias da semana que a monitoria estará aberta" required>
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
                    <option value="Todos os Cursos" selected>Todos os cursos</option>
                    <option value="Administração">Administração</option>
                    <option value="Alimentos">Alimentos</option>
                    <option value="Agropecuária">Agropecuária</option>
                    <option value="Informática">Informática</option>
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
