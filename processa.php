<?php
    session_start();

    $_SESSION['matricula'] = $_POST['matricula'];

    $_SESSION['senha'] = $_POST['senha'];

    $matricula = $_SESSION['matricula'];

    $senha = $_SESSION['senha'];

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "monitorrei";
    

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    // Consulta SQL para verificar se o usuário e a senha existem na tabela
    $query = "SELECT * FROM usuario WHERE matricula = '$matricula' AND senha = '$senha'";
    $result = mysqli_query($conn, $query);
 
    // Verifica se a consulta retornou algum resultado
    if (mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);
      $_SESSION['usuario_id'] = $user['id']; 
      $_SESSION['cargo'] = $user['cargo']; 
      $_SESSION['nome'] = $user['nome']; 
      $_SESSION['curso'] = $user['curso']; 
      echo "
      <script>
          alert('Login realizado com sucesso, bem-vindo!');
          window.location.href = 'monitorias.php';
      </script>";
      exit();
    } else {
      // Usuário ou senha incorretos, redirecionar para uma página de erro
      echo "
      <script>
          alert('Matrícula ou senha incorretos');
          window.location.href = 'index.html';
      </script>";
      exit();
    }
?>