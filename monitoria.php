<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <html lang="pt-br">
    <title>Monitoria - $nome_monitoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .banner {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), url(imgs/banner-estudo.png) no-repeat center;
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

        .pedido-header img,
        .resposta-monitor img {
            border-radius: 50%;
        }

        .card-pedido {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <?php
    include('conexao.php');
    include('navbar.php');
    include('dados_monitoria.php');

    if ($_SESSION['usuario_id'] == $id_monitor) {
        include('info_monitor.php');
    } elseif ($_SESSION['cargo'] == 2) {
        include('info_professor.php');
    } else {
        include('info_monitoria.php');
    }
    ?>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    </html>