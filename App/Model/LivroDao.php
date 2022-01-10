<?php

namespace App\Model;

class LivroDao
{
	public function create(Livro $l) {

		$sql = 'INSERT INTO livros (nome, autor, nicho, sit, descricao, datealuguel) VALUES  (?,?,?,?,?,?)';

		$result = Connect::getConn()->prepare($sql);

		$result->bindValue(1, $l->getNome());
		$result->bindValue(2, $l->getAutor());
		$result->bindValue(3, $l->getNicho());
		$result->bindValue(4, $l->getSit());
		$result->bindValue(5, $l->getDescricao());
		$result->bindValue(6, $l->getDatealuguel());

		$result->execute();

		$id = Connect::getConn()->lastInsertId();

		$l->setId($id);
	}
	
	public function collect($id){

		$sql = "SELECT * FROM livros WHERE id = '$id'";

		$result = Connect::getConn()->prepare($sql);
		$result->execute();

		if($result->rowCount() > 0):
			return $result->fetchAll(\PDO::FETCH_ASSOC);
		endif;
	}

	public function read() {

		$sql = 'SELECT * FROM livros ';

		$result = Connect::getConn()->query($sql);

		$result = $result->fetchAll();

		return $result;
	}

	public function readuser($id) {

		$sql = "SELECT * FROM livros WHERE user ='$id'";

		$result = Connect::getConn()->query($sql);

		$result = $result->fetchAll();

		return $result;
	}

	public function alugue($iduser, $idlivro) {

		date_default_timezone_set('America/Sao_Paulo');
	    $date = date('Y/m/d');

		$sql = "UPDATE livros SET sit = 0, user = '$iduser', datealuguel = '$date' WHERE id = '$idlivro'";

		Connect::getConn()->query($sql);

		return;
	}

	public function devolve($idlivro) {

		$sql = "UPDATE livros SET sit = 1, user = 0, datealuguel = '' WHERE id = '$idlivro'";

		Connect::getConn()->query($sql);
	}

	public function update($l, $id) {

		$sql - "UPDATE livros SET nome = ?, autor = ?, descricao =? WHERE id = 'idlivro'";

		$result = Connect::getConn()->prepare($sql);

		$result->bindValue(1, $l->getNome());
		$result->bindValue(2, $l->getAutor());
		$result->bindValue(3, $l->getDescricao());

		$result->execute();
	}

	public function delete($id) {

		$sql = "DELETE FROM livros WHERE id = '$id'";

		Connect::getConn()->query($sql);
	}
}