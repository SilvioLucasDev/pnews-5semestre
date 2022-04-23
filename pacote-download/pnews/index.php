<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <title>PNEWS - Login</title>
    <link rel="icon" href="assets/img/logo-titulo.png">
</head>

<body>

    <main>
        <div class="container">
            <div class="row vh-100">

                <?php 
                    if (isset($_SESSION['retorno']) && $_SESSION['retorno'] == 'sucesso') { 
                        unset($_SESSION['retorno']);    
                ?>
                    <div id="succes" class="col-12">
                        <div class="bg-success text-white d-flex justify-content-center">
                            <h2><?php echo $_SESSION["msg"]; unset($_SESSION["msg"]);?></h2>
                        </div>
                    </div>

                    <script>
                        setTimeout(function () {
                            $("#succes").hide('slow');
                        }, 3000);
                    </script>
                <?php } ?>

                <!-- Logo -->
                <div class="col-5 d-none d-lg-block align-self-center">
                    <div class="row justify-content-center">
                        <img src="assets/img/logo-pnews-login.svg" alt="Logo Pnews">
                    </div>

                    <div class="row justify-content-center">
                        <img src="assets/img/mascote.svg" width="509" height="475" alt="Mascote Pnews">
                    </div>
                </div>

                <!-- Login -->
                <div class="col col-lg-7">
                    <div class="container cor-fundo">
                        <div class="row justify-content-center vh-100">
                            <div class="col-10 col-sm-8 text-center align-self-center">
                                <h2 class="mb-5"><strong>Login</strong></h2>

                                <form class="mb-5" action="controller/userController.php"  method="POST" >
                                    <input class="form-control borda" id="email" type="text" name="email" placeholder="E-mail">
                                    <br>
                                    <input class="form-control borda" id="senha" type="password" name="senha" placeholder="Senha">

                                    <?php 
                                        if (isset($_SESSION['retorno']) && $_SESSION['retorno'] == 'erro') { 
                                            unset($_SESSION['retorno']);    
                                    ?>
                                        <div id="error" class="row mt-0 mt-1">
                                            <div class="col">
                                                <span class="text text-danger"><?php echo $_SESSION["msg"]; unset($_SESSION["msg"]);?></span>
                                            </div>
                                        </div>

                                        <script>
                                            setTimeout(function () {
                                                $("#error").hide('slow');
                                            }, 3000);
                                        </script>
                                    <?php } ?>

                                    <br>
                                    <a href="#" class="link-secondary"><u>Esqueceu a senha?</u></a>
                                    <br>

                                    <!-- Futuramente implementar login com APIS 
                                        <div class="m-5">
                                            <a href="#" class="btn">
                                                <i class="fab fa-facebook-square fa-3x"></i>
                                            </a>
                                            
                                            <a href="#" class="btn">
                                                <i class="fab fa-google-plus-square fa-3x"></i>
                                            </a>
                                        </div>
                                        -->

                                    <button id="btnLogin" class="btn btn-outline-danger btn-lg borda mt-4" type="submit" name="login">Continuar</button>
                                </form>

                                <a href="views/register.php" class="link-secondary h5"> Cadastre-se grátis</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <?php
    include_once 'views/includes/footer.php ';
    ?>
<script src="assets/js/login.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/54ed41f2b2.js" crossorigin="anonymous"></script>