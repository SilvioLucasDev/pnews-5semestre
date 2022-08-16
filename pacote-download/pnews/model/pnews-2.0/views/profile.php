<?php
require_once 'includes/header.php';
?>

<link rel="stylesheet" type="text/css" href="../assets/css/modal.css">

<main id="main-perfil" class="full-height">
      <div class="container h-100 px-0">
            
            <?php 
                  extract($_SESSION["usuario"]);
            ?>

            <div class="row m-0 py-3 border-bottom ">
                  <h2><strong>Bem - vindo, <?php echo $nome; ?></strong></h2>

                  <div class="row justify-content-between">
                        <div class="col">
                              <span>E-mail: <?php echo $email; ?></span>
                        </div>

                        <div class="col-4 text-end px-0 mx-0">
                              <a class="text-black px-0" data-toggle="modal" data-target="#modalAlterarSenha" href="#">
                                    <strong>Redefinir senha</strong>
                              </a>
                        </div>

                  </div>
            </div>

            <div class="row m-0 py-3 border-bottom">
                  <h2><strong>Meus dados</strong></h2>
                  <span>CPF/CNPJ: <?php echo $cpf; ?></span>
                  <span>Data Nascimento: <?php echo $dt_nascimento; ?></span>
                  <span>Telefone: <?php echo $telefone; ?></span>
            </div>

            <div class="row m-0 py-3 border-bottom">
                  <h2><strong>Endereço</strong></h2>
                  <span>Rua <?php echo $rua;  ?> </span>
                  <span>Número <?php echo $numero;  ?>, <?php echo $bairro;  ?></span>
                  <span><?php echo $cidade;  ?> - <?php echo $estado;  ?> </span>
            </div>

            <div class="row justify-content-center m-0 py-3 border-bottom">
                  <h2><strong>Informações cadastrais</strong></h2>
                  <span>Modelo da moto: <?php echo $modelo_moto;  ?></span>
                  <span>Marca de pneu utilizado: <?php echo $pneu_utilizado;  ?></span>
                  <span>Modelo do pneu: <?php echo $modelo_pneu;  ?></span>
                  <span>Tempo médio de troca: <?php echo $tp_medio_troca;  ?></span>
            </div>
      </div>
</main>

<!-- Modal -->
<div class="modal fade t-modal" id="modalAlterarSenha" tabindex="-1" role="dialog" aria-labelledby="modalAlterarSenha" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                  <div class="modal-header text-center">
                        <h5 class="modal-title">Alteração de Senha</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>

                  <div class="modal-body">
                        <div class="container-fluid">

                              <div class="row justify-content-and">
                                    <div class="col-12 text-center align-self-center">
                                          <form id="alteraSenha" style="margin: 10px 20px 10px 20px;"  action="../controller/userController.php"  method="POST" >

                                                <input class="form-control my-2 borda" type="password" name="senha" id="senha" placeholder="Senha Atual" required>

                                                <input class="form-control my-2 borda" type="password" name="senha2" id="senha2"  minlength="6" placeholder="Nova senha" required>

                                                <input class="form-control my-2 borda" type="password" name="senha3" id="senha3"  minlength="6" placeholder="Confirme a nova senha" required>

                                          </form>
                                    </div>
                              </div>

                              <div class="row">
                                    <div class="col text-center borda-form p-0">
                                          <button id="btnAlteraSenha" name="alteraSenha" form="alteraSenha" type="submit" class="btn btn-secondary btn-block rounded-0 m-0" style="border-bottom-left-radius: 0.2rem !important; border-bottom-right-radius: 0.2rem !important;"> Enviar</button>
                                    </div>
                              </div>

                        </div>
                  </div>

            </div>
      </div>
</div>

<?php
include_once 'includes/footer.php';
?>

<script src="../assets/js/profile.js"></script>

