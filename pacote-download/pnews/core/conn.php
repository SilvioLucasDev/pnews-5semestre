<?php 
    
    // Classe de conexão com o bando de dados
    class Conexao{
        private $host = 'HOST';
        private $dbname = 'DBNAME';
        private $user = 'USER';
        private $pass = 'PASS';


    public function conectar() {

        try {

            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

            return $conexao;
            
        } catch (PDOException $e) {
            echo '<p>' .$e->getMessege(). '</p>';
        }

        }
    }

?>
