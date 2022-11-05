<?php 
    
    // Classe de conexão com o bando de dados
    class Conexao{
        private $host = 'localhost';
        private $dbname = 'pnews';
        private $port = 3307;
        private $user = 'root';
        private $pass = '';


    public function conectar() {

        try {

            $conexao = new PDO("mysql:host=" .$this->host. ";port=" .$this->port. ";dbname=" .$this->dbname, $this->user, $this->pass);

            return $conexao;
            
        } catch (PDOException $err) {
            echo '<p>' .$err->getMessege(). '</p>';
        }

        }
    }

?>
