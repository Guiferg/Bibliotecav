<?php

namespace App\Model;

class UserDao
{

	public function create(User $u){

		$sql = 'INSERT INTO users (nome, email, login, senha, tipo, foto, multa) VALUES (?,?,?,?,?,?,?)';

		$result = Connect::getConn()->prepare($sql);

		$result->bindValue(1, $u->getNome());
		$result->bindValue(2, $u->getEmail());
		$result->bindValue(3, $u->getLogin());
		$result->bindValue(4, $u->getSenha());
		$result->bindValue(5, $u->getTipo());
		$result->bindValue(6, $u->getFoto());
		$result->bindValue(7, $u->getMulta());

		$result->execute();

		$id = Connect::getConn()->lastInsertId();

		$u->setId($id);
	}

	public function somamulta($valor, $iduser) {

		$sql = "UPDATE users SET multa = '$valor' WHERE id = '$iduser'";

		$result = Connect::getConn()->query($sql);
	}

	public function collect($id){

		$sql = "SELECT * FROM users WHERE id = '$id'";

		$result = Connect::getConn()->prepare($sql);
		$result->execute();

		if($result->rowCount() > 0):
			return $result->fetchAll(\PDO::FETCH_ASSOC);
		endif;
	}

	public function read(){

		$sql = "SELECT * FROM users";

		$result = Connect::getConn()->query($sql);

		$result = $result->fetchAll();

		return $result;
	}

	public function update(User $u, $id) {

		$sql = "UPDATE users SET nome = ?, email = ?, login = ?, senha = ? WHERE id = '$id'";

		$result = Connect::getConn()->prepare($sql);

		$result->bindValue(1, $u->getNome());
		$result->bindValue(2, $u->getEmail());
		$result->bindValue(3, $u->getLogin());
		$result->bindValue(4, $u->getSenha());

		$result->execute();

	}

	public function delete($id){

		$sql = "DELETE FROM users WHERE id = '$id'";

		Connect::getConn()->query($sql);
	}

	public function pagarmulta($id) {

		$sql = "UPDATE users SET multa = 0 WHERE id = '$id'";

		Connect::getConn()->query($sql);
	}
}