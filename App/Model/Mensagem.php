<?php

namespace App\Model;

class Mensagem
{
	private $id;
	private $remetente;
	private $destinatario;
	private $mensagem;

	public function __construct($remetente, $destinatario, $mensagem) {

		$this->remetente = $remetente;
		$this->destinatario = $destinatario;
		$this->mensagem = $mensagem;
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getRemetente() {
		return $this->remetente;
	}

	public function setRemetente($remetente) {
		$this->remetente = $remetente;
	}

	public function getDestinatario() {
		return $this->destinatario;
	}

	public function setDestinatario($destinatario) {
		$this->destinatario = $destinatario;
	}

	public function getMensagem() {
		return $this->mensagem;
	}

	public function setMensagem($mensagem) {
		$this->mensagem = $mensagem;
	}
}