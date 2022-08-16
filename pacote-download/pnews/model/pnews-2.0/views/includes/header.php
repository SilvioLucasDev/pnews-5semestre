<?php
    require_once '../controller/userController.php';

    if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Estilo customizado -->
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

        <title>PNEWS</title>
        <link rel="icon" href="../assets/img/logo-titulo.png">
    </head>

    <body>
            <?php 
                if (isset($_SESSION['retorno']) && !empty($_SESSION['retorno'])) { 
            ?>
                <div id="retornoMsg" class="col-12">
                    <div class="<?php echo  $_SESSION['retorno'] == "sucesso" ? "bg-success" :  "bg-danger"; ?> text-white d-flex justify-content-center">
                        <h2><?php echo $_SESSION["msg"]; unset($_SESSION["msg"]);?></h2>
                    </div>
                </div>

                <script>
                    setTimeout(function () {
                        $("#retornoMsg").hide('slow');
                    }, 3000);
                </script>
            <?php 
                    unset($_SESSION['retorno']);    
                    unset($_SESSION['msg']);    
                  } 
            ?>

        <header>
            <!-- Início cabeçalho -->
            <nav class="navbar navbar-expand-md navbar-light cor-fundo border-bottom py-0">
                <div class="container">

                    <!-- Logo -->
                    <a href="#" class="navbar-brand py-0">
                        <img src="../assets/img/logo-pnews-home.svg" alt="Logo Pnews">
                    </a>

                    <!-- Menu Hamburguer -->
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-target">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navegação -->
                    <div class="collapse navbar-collapse justify-content-end" id="nav-target">
                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <a href="home.php" class="nav-link text-black">
                                    <strong>Home</strong>
                                </a>
                            </li>

                            <li class="divisor-nav align-self-center collapse navbar-collapse"></li>

                            <li class="nav-item">
                                <a href="../controller/userController.php?perfil=1" class="nav-link text-black">
                                    <strong>Perfil</strong>
                                </a>
                            </li>

                            <li class="divisor-nav align-self-center collapse navbar-collapse"></li>

                            <li class="nav-item">
                                <a href="../controller/userController.php?sair=1" class="nav-link text-black">
                                    <strong>Sair</strong>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        </header><!-- Fim cabeçalho -->
        