<?php

    //CRUD
    class UsuarioModel {

        private $conexao;
        private $usuario;

        public function __construct(Conexao $conexao, Usuario $usuario) {
            $this->conexao = $conexao->conectar();
            $this->usuario = $usuario;
        }

        // ---------------- Validar Login ----------------
        public function validarLogin() {

            //HASH FICA MUANDO DE VALOR E NÃO BATE COM O DO BANCO DE DADOS
            // $teste2 = "Luc@s001";
            // echo $teste = password_hash($teste2,PASSWORD_DEFAULT);

            // exit;

            $query = "SELECT id, nome, email, senha FROM usuarios WHERE email = :email AND senha = :senha";
            $stmt = $this->conexao->prepare($query); 
            $stmt->bindValue(':email', $this->usuario->__get('email'));
            $stmt->bindValue(':senha', password_hash($this->usuario->__get('senha'),PASSWORD_DEFAULT));
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $count=  $stmt->rowCount();

            // echo "<pre>";
            // print_r($result);
            // echo "<pre>";

            // echo $count;
            // exit;

            if($count == 1 ) {
                if(password_verify($this->usuario->__get("senha"), $result["senha"])){
                    $_SESSION['autenticado'] = "SIM";
                    $_SESSION['id'] = $result['id'];
                    return true;
                }
                
            } else {
                $_SESSION["retorno"] =  "erro";
                $_SESSION["msg"] = "*E-mail e/ou senha inválido(s)"; 
                return false;
            } 
        }

        // ---------------- Inserir dados do cadastro ----------------
        public function cadastrar() { 
            $query = "SELECT email, cpf FROM usuarios WHERE cpf = :cpf OR email = :email" ;
            $stmt = $this->conexao->prepare($query); 
            $stmt->bindValue(':cpf', $this->usuario->__get('cpf'));
            $stmt->bindValue(':email', $this->usuario->__get('email'));
            $stmt->execute();
            $result=  $stmt->rowCount();

            if ($result == 0) {
                $query = 'INSERT INTO usuarios (nome, cpf, dt_nascimento, telefone, email, senha, rua, numero, bairro, cidade, estado, modelo_moto, pneu_utilizado, modelo_pneu, tp_medio_troca)
                VALUES (:nome, :cpf, :dt_nascimento, :telefone, :email, :senha, :rua, :numero, :bairro, :cidade, :estado, :modelo_moto, :pneu_utilizado, :modelo_pneu, :tp_medio_troca)';
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':nome', $this->usuario->__get('nome'));
                $stmt->bindValue(':cpf', $this->usuario->__get('cpf'));
                $stmt->bindValue(':dt_nascimento', $this->usuario->__get('dt_nascimento'));
                $stmt->bindValue(':telefone', $this->usuario->__get('telefone'));
                $stmt->bindValue(':email', $this->usuario->__get('email'));
                $stmt->bindValue(':senha', password_hash($this->usuario->__get('senha'),PASSWORD_DEFAULT));
                $stmt->bindValue(':rua', $this->usuario->__get('rua'));
                $stmt->bindValue(':numero', $this->usuario->__get('numero'));
                $stmt->bindValue(':bairro', $this->usuario->__get('bairro'));
                $stmt->bindValue(':cidade', $this->usuario->__get('cidade'));
                $stmt->bindValue(':estado', $this->usuario->__get('estado'));
                $stmt->bindValue(':modelo_moto', $this->usuario->__get('modelo_moto'));
                $stmt->bindValue(':pneu_utilizado', $this->usuario->__get('pneu_utilizado'));
                $stmt->bindValue(':modelo_pneu', $this->usuario->__get('modelo_pneu'));
                $stmt->bindValue(':tp_medio_troca', $this->usuario->__get('tp_medio_troca'));
                $stmt->execute();

                $_SESSION["retorno"] =  "sucesso";
                $_SESSION["msg"] = "Cadastro realizado com sucesso!"; 
                return true;

            } else {
                $_SESSION["retorno"] =  "erro";
                $_SESSION["msg"] = "E-mail e/ou CPF já cadastrado no sistema!";  
                return false;
            }
        }

        // ---------------- Recuperar dados do usuário ----------------
        public function recuperar() {
            $query = "SELECT nome, cpf, dt_nascimento, telefone, email, senha, rua, numero, bairro, cidade, estado, modelo_moto, pneu_utilizado, modelo_pneu, tp_medio_troca
            FROM usuarios WHERE id = :id";
            $stmt = $this->conexao->prepare($query); 
            $stmt->bindValue(':id', $this->usuario->__get('id'));
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION["usuario"] = $result;

            return true;
        } 

          // ---------------- Altera senha do usuário ----------------
          public function alterarSenha() {
            $query = "SELECT email, senha FROM usuarios WHERE id = :id";
            $stmt = $this->conexao->prepare($query); 
            $stmt->bindValue(':id', $this->usuario->__get('id'));
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if(password_verify($this->usuario->__get("senha"), $result["senha"])){
                $query = "UPDATE usuarios SET senha = :nova_senha WHERE id = :id";
                $stmt = $this->conexao->prepare($query); 
                $stmt->bindValue(':nova_senha', password_hash($this->usuario->__get("nova_senha"),PASSWORD_DEFAULT));
                $stmt->bindValue(':id', $this->usuario->__get('id'));
                $stmt->execute();

                $_SESSION["retorno"] =  "sucesso";
                $_SESSION["msg"] = "Senha alterada com sucesso!"; 
                return true;
                
            } else {
                $_SESSION["retorno"] =  "erro";
                $_SESSION["msg"] = "Erro ao alterar a senha!";  
                return false;
            }
        }
    }

?>

