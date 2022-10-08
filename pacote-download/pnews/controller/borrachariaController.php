<?php
ob_start();
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../core/conn.php";
require_once "../model/classBorracharia.php";
require_once "../model/borrachariaModel.php";

// ---------------- Cadastra borracharias ----------------
if (isset($_POST['cadBorracharia'])) {

    if (isset($_POST['nome']) || isset($_POST['telefone'])) {

        $borracharia = new Borracharia();
        $borracharia->__set('nome', $_POST['nome']);
        $borracharia->__set('telefone', $_POST['telefone']);
        $borracharia->__set('email', $_POST['email']);
        $borracharia->__set('coordenadas', $_POST['inputCoords']);

        $conexao = new Conexao();

        $borrachariaModel = new borrachariaModel($conexao, $borracharia);
        $borrachariaModel->cadBorracharia();

        header('location: ../views/maps.php');
    } else {

        $_SESSION["retorno"] =  "erro";
        $_SESSION["msg"] = "Por favor, preencha um campo de contato.";

        header('location: ../views/maps.php');
    }

    //--------------- Select nas borracharias ----------------
} else if (isset($_GET['getBorracharias'])) {

    $conexao = new Conexao();

    $borrachariaModel = new borrachariaModel($conexao, $borracharia = null);
    $borrachariaModel->getBorracharias();

    header('location: ../views/maps.php');
}
