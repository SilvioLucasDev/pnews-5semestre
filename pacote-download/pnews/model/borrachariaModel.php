<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

//CRUD
class borrachariaModel
{

    private $conexao;
    private $borracharia;

    public function __construct(Conexao $conexao, Borracharia $borracharia = null)
    {

        $this->conexao = $conexao->conectar();
        $this->borracharia = $borracharia;
    }

    
    // ---------------- Formata as coordenadas recebidas pelo usuário ----------------
    function formatCoordenadas($string = null) {
        $procurar = array("(", ")");
        $remover = array("", "");
        return str_replace($procurar, $remover, $string);
    }

    // ---------------- Cadastrar borracharia ----------------
    public function cadBorracharia()
    {

        $coordenadas = explode(" ", $this->formatCoordenadas($this->borracharia->__get('coordenadas')));
        $this->borracharia->__set('coordenadas', "{lat: ".$coordenadas[0]."lng: ".$coordenadas[1]."}");

        $query = 'INSERT INTO borracharias (nome, telefone, email, coordenadas, statusAprov)
                VALUES (:nome, :telefone, :email, :coordenadas, :statusAprov)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome', $this->borracharia->__get('nome'));
        $stmt->bindValue(':telefone', $this->borracharia->__get('telefone'));
        $stmt->bindValue(':email', $this->borracharia->__get('email'));
        $stmt->bindValue(':coordenadas', $this->borracharia->__get('coordenadas'));
        $stmt->bindValue(':statusAprov', '1');
        $result = $stmt->execute();

        if ($result == 1) {
            $_SESSION["retorno"] =  "sucesso";
            $_SESSION["msg"] = "Sucesso! <br> A borracharia cadastrada passará por um processo de aprovação que irá durar até 72horas úteis.";
            return true;
        } else {
            $_SESSION["retorno"] =  "erro";
            $_SESSION["msg"] = "Erro ao solicitar cadastro de nova borracharia!";
            return false;
        }
    }


    // ---------------- Select borracharia ----------------
    public function getBorracharias()
    {
        $query = "SELECT nome, cnpj, telefone, email, coordenadas, cep, rua, numero, bairro, cidade, estado, complemento 
            FROM borracharias WHERE statusAprov = :statusAprov";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':statusAprov', '2');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['borracharias'] = $result;

        return true;
    }
}