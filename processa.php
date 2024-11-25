<?php
    session_start();

    $_SESSION['cpf'] = $_POST['cpf'];

    $_SESSION['senha'] = $_POST['senha'];

    $cpf = $_SESSION['cpf'];

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
    $query = "SELECT * FROM usuario WHERE cpf = '$cpf' AND senha = '$senha'";
    $result = mysqli_query($conn, $query);
 
    // Verifica se a consulta retornou algum resultado
    if (mysqli_num_rows($result) > 0) {
      // Usuário encontrado, redirecionar para a página de formulário
      echo "
      <script>
          alert('Login realizado com sucesso, bem-vindo!');
          window.location.href = 'monitorias.html';
      </script>";
      exit();
    } else {
      // Usuário ou senha incorretos, redirecionar para uma página de erro
      echo "
      <script>
          alert('CPF ou senha incorretos');
          window.location.href = 'index.html';
      </script>";
      exit();
    }
?>