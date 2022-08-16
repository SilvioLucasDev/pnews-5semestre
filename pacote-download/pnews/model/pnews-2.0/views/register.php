<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Estilo customizado --> 
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <title>PNEWS - Cadastro</title>
    <link rel="icon" href="../assets/img/logo-titulo.png">
  </head>

  <body>

    <main>
            <div class="container">
                <div class="row vh-100">

                <?php if (isset($_SESSION['retorno']) && $_SESSION['retorno'] == 'erro') { 
                    unset($_SESSION['retorno']);    
                ?>
                    <div id="succes" class="col-12">
                        <div class="bg-danger text-white d-flex justify-content-center">
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
                            <img src="../assets/img/logo-pnews-login.svg" alt="Logo Pnews">
                        </div>

                        <div class="row justify-content-center">
                            <img src="../assets/img/mascote.svg" width="509" height="475" alt="Mascote Pnews">
                        </div>
                    </div>

                    <!-- Formulário -->
                    <div class="col col-lg-7 cor-fundo">
                        <div class="container">

                            <div class="row mt-3 mt-sm-5 justify-content-center">
                                    <h4 class="text-center col mt-sm-5 mb-sm-4"><strong>Insira seus dados para realizar o cadastro</strong></h2>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-8 text-center align-self-center">

                                    <form class="mb-5" action="../controller/userController.php" method="POST">
                                        <input class="form-control my-2 borda" type="text" id="nome" name="nome" placeholder="Nome" maxlength="100" >

                                        <div class="row my-2">
                                            <div class=" col-md-8 col-lg-7 col-xl-8">
                                                <input class="form-control borda input-mask-cpf" type="text" id="cpf"  name="cpf" placeholder="CPF">
                                            </div>

                                            <div class="mt-2 mt-md-0 col-md-4 col-lg-5 col-xl-4">
                                                <input class="form-control borda input-mask-date" type="text" id="dt_nascimento" name="dt_nascimento" placeholder="Nascimento">
                                            </div>
                                        </div>

                                        <input class="form-control my-2 borda inputMask_tel" type="text" id="telefone" name="telefone" placeholder="Telefone" >

                                        <input class="form-control my-2 borda inputMask_email" type="text" id="email" name="email" placeholder="E-mail" >

                                        <input class="form-control my-2 borda" type="password" id="senha" name="senha" placeholder="Senha" >

                                        <div class="row my-2">
                                            <div class="col-md-9">
                                                <input class="form-control borda" type="text" id="rua" name="rua" placeholder="Rua" >
                                            </div>

                                            <div class="mt-2 mt-md-0 col-md-3">
                                                <input class="form-control borda" type="text" id="numero" name="numero" placeholder="Nº" >
                                            </div>
                                        </div>

                                        <input class="form-control my-2 borda" type="text" id="bairro" name="bairro" placeholder="Bairro" >

                                        <div class="row my-2">
                                            <div class="col-md-7">
                                                <input class="form-control borda" type="text" id="cidade" name="cidade" placeholder="Cidade" >
                                            </div>

                                            <div class="mt-2 mt-md-0 col-md-5">
                                                <input class="form-control borda" type="text" id="estado" name="estado" placeholder="Estado" >
                                            </div>
                                        </div>

                                        <input class="form-control my-2 borda" type="text" id="modelo_moto" name="modelo_moto" placeholder="Modelo da moto" >

                                        <input class="form-control my-2 borda" type="text" id="pneu_utilizado" name="pneu_utilizado" placeholder="Marca de pneu utilizado" >

                                        <input class="form-control my-2 borda" type="text" id="modelo_pneu" name="modelo_pneu" placeholder="Modelo do pneu" >
 
                                        <select class="form-control my-2 borda colorInputForm" id="tp_medio_troca" name="tp_medio_troca" >
                                                <option selected value="">Tempo médio de troca</option>
                                                <option value="1 Mês">1  Mês</option>
                                                <option value="2 Meses">2  Meses</option>
                                                <option value="3 Meses">3  Meses</option>
                                                <option value="4 Meses">4  Meses</option>
                                                <option value="5 Meses">5  Meses</option>
                                                <option value="6 Meses">6  Meses</option>
                                                <option value="7 Meses">7  Meses</option>
                                                <option value="8 Meses">8  Meses</option>
                                                <option value="9 Meses">9  Meses</option>
                                                <option value="10 Meses">10  Meses</option>
                                                <option value="11 Meses">11 Meses</option>
                                                <option value="12 Meses">12  Meses</option>
                                                <option value="2 Anos">2  Anos</option>
                                                <option value="3 Anos ou mais">3  Anos ou mais</option>
                                            </select>

                                        <!-- <input class="form-control my-2 borda" type="text" id="tp_medio_troca" name="tp_medio_troca" placeholder="Tempo médio de troca" > -->

                                        <button id="btnResgistro" class="btn btn-outline-danger btn-lg mt-4 borda" type="submit" name="cadastro">Continuar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>

    </footer>
        <p class="bg-black bg-opacity-50 text-black text-center mb-0 fixed-bottom">2021 © Copyright GRUPO 9 SI technologies.</p>
    <footer>


        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
       
        <script src="../assets/js/mask.js"></script>
        <script src="../assets/js/jquery.mask.js"></script>
        <script src="../assets/js/register.js"></script>
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/54ed41f2b2.js" crossorigin="anonymous"></script>

    </body>
</html>