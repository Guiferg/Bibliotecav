<?php

namespace App\Model;

class MensagemDao
{

	public function create(Mensagem $m) {

		$sql = 'INSERT INTO mensagens (remetente, destinatario, mensagem) VALUES  (?,?,?)';

		$result = Connect::getConn()->prepare($sql);

		$result->bindValue(1, $m->getRemetente());
		$result->bindValue(2, $m->getDestinatario());
		$result->bindValue(3, $m->getMensagem());

		$result->execute();

		$id = Connect::getConn()->lastInsertId();

		$m->setId($id);
	}
}