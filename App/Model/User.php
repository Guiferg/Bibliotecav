<?php

namespace App\Model;

class User
{
	private $id;
	private $nome;
	private $tipo;
	private $email;
	private $login;
	private $senha;
	private $foto;
	private $multa;

	public function __construct($nome, $email, $login, $senha) {

		$this->nome = $nome;
		$this->email = $email;
		$this->login = $login;
		$this->senha = $senha;
		$this->foto = "chopper.jpg";
		$this->tipo = 0;
		$this->multa =0;


	}

	public function getMulta() {
		return $this->multa;
	}

	public function setMulta($multa) {
		$this->multa = $multa;
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	public function getTipo() {
		return $this->tipo;
	}

	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	
	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}
	
	public function getLogin() {
		return $this->login;
	}

	public function setLogin($login) {
		$this->login = $login;
	}
	
	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
	}
	
	public function getFoto() {
		return $this->foto;
	}

	public function setFoto($foto) {
		$this->foto = $foto;
	}
}