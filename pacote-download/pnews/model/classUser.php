<?php

	//Classe de usuário
	class Usuario {
		private $id;
		private $email;
		private $senha;
		private $nova_senha;
		private $nome;
		private $cpf;
		private $dt_nascimento;	
		private $telefone;
		private $rua;
		private $numero;
		private $bairro;
		private $cidade;
		private $estado;
		private $modelo_moto;
		private $pneu_utilizado;
		private $modelo_pneu;
		private $tp_medio_troca;

		public function __get($atributo) {
			return $this->$atributo;
		}

		public function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}
	}

?>

