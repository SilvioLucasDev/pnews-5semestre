<?php
    session_start();
    
    require_once "../core/conn.php";
    require_once "../model/classUser.php";
    require_once "../model/userModel.php";

    // ---------------- Validar Login ----------------
    if(isset($_POST['login'])) {

        $usuario = new Usuario();
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', $_POST['senha']);

        $conexao = new Conexao();

        $UsuarioModel = new UsuarioModel($conexao, $usuario);
        $return = $UsuarioModel->validarLogin();

        if($return) {
            header('location: ../views/home.php');

        } else {
            header("Location: ../index.php");
        } 

    // ---------------- Inserir dados do cadastro ----------------
    } else if(isset($_POST['cadastro'])) {

        $usuario = new Usuario();
        $usuario->__set('nome', $_POST['nome']);
        $usuario->__set('cpf', $_POST['cpf']);
        $usuario->__set('dt_nascimento', $_POST['dt_nascimento']);
        $usuario->__set('telefone', $_POST['telefone']);
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', $_POST['senha']);
        $usuario->__set('rua', $_POST['rua']);
        $usuario->__set('numero', $_POST['numero']);
        $usuario->__set('bairro', $_POST['bairro']);
        $usuario->__set('cidade', $_POST['cidade']);
        $usuario->__set('estado', $_POST['estado']);
        $usuario->__set('modelo_moto', $_POST['modelo_moto']);
        $usuario->__set('pneu_utilizado', $_POST['pneu_utilizado']);
        $usuario->__set('modelo_pneu', $_POST['modelo_pneu']);
        $usuario->__set('tp_medio_troca', $_POST['tp_medio_troca']);

		$conexao = new Conexao();

        $UsuarioModel = new UsuarioModel($conexao, $usuario);
		$return = $UsuarioModel->cadastrar();

        if($return) {
            header("location: ../index.php");
            
        } else {
            header("Location: ../views/register.php");
        } 
    

    // ---------------- Recuperar dados do usuário ----------------
    } else if(isset($_GET['perfil'])) {	    

		$usuario = new Usuario();
        $usuario->__set('id', $_SESSION['id']);

		$conexao = new Conexao();

        $UsuarioModel = new UsuarioModel($conexao, $usuario);
        $UsuarioModel->recuperar();

        header('location: ../views/profile.php');


    // ---------------- Altera senha do usuário ----------------
    } else if(isset($_POST['alteraSenha'])) { 

        if(!empty($_POST['senha']) && !empty($_POST['senha2'])) {

            $usuario = new Usuario();
            $usuario->__set('id', $_SESSION['id']);
            $usuario->__set('senha', $_POST['senha']);
            $usuario->__set('nova_senha', $_POST['senha2']);

            $conexao = new Conexao();

            $UsuarioModel = new UsuarioModel($conexao, $usuario);
            $return = $UsuarioModel->alterarSenha();

            header('location: ../views/profile.php?alteraSenha');
        }

        
    // ---------------- Encerra a sessão do usuário ----------------
    } else if(isset($_GET['sair'])) {	

        session_destroy();
        header('location: ../index.php');
    }
?>