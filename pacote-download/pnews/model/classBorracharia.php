<?php

//Classe de borracharia
class Borracharia
{
	private $id;
	private $nome;
	private $telefone;
	private $email;
	private $coordenadas;

	public function __get($atributo)
	{
		return $this->$atributo;
	}

	public function __set($atributo, $valor)
	{
		$this->$atributo = $valor;
	}
}
