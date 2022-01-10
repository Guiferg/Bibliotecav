<?php

namespace App\Model;

class Livro
{
	private $id;
	private $dateupload;
	private $sit;
	private $user;
	private $nome;
	private $autor;
	private $nicho;
	private $descricao;
	private $imagem;
	private $datealuguel;

	public function __construct($nome, $autor, $nicho, $descricao) {

			$this->user = "";
			$this->nome = $nome;
			$this->autor = $autor;
			$this->nicho = $nicho;
			$this->sit = 1;
			$this->descricao = $descricao;
	        $this->imagem = "";

	        date_default_timezone_set('America/Sao_Paulo');
	    	$date = date('Y/m/d H:s:i');
	        $this->datealuguel = $date;

	}

	public function getDatealuguel() {
		return $this->datealuguel;
	}

	public function setDatealuguel($datealuguel) {
		$this->datealuguel = $datealuguel;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getDateupload() {
		return $this->dateupload;
	}

	public function setDateupload($dateupload) {
		$this->dateupload = $dateupload;
	}

	public function getSit() {
		return $this->sit;
	}

	public function setSit($sit) {
		$this->sit = $sit;
	}

	public function getUser() {
		return $this->user;
	}

	public function setUser($user) {
		$this->user = $user;
	}

	public function getNicho() {
		return $this->nicho;
	}

	public function setNicho($nicho) {
		$this->nicho = $nicho;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getAutor() {
		return $this->autor;
	}

	public function setAutor($autor) {
		$this->autor = $autor;
	}

}