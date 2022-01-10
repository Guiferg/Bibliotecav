<?php

namespace App\Model;
require_once '../../vendor/autoload.php';
session_start();

if(isset($_SESSION['idadmin'])):

	$idlivro = $_POST['idlivro'];

	if(isset($_POST['btn-edit'])):

		echo "debug";

		$nome = $_POST['nome'];
		$autor = $_POST['autor'];
		$descricao = $_POST['descricao'];

		$livro = new \App\Model\Livro($nome, $autor, "", $descricao);

		$livroDao = new \App\Model\LivroDao();

		$livroDao->update($livro, $idlivro);

		//carregar foto

        $formatosPermitidos = array("png", "jpeg", "jpg", "gif", "jfif");

        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

        //verificar se o tamanho do arquivo é manor que 1MB
        if(filesize($_FILES['arquivo']['tmp_name'])<1048576):
	        if(in_array($extensao, $formatosPermitidos)):

	        	$pasta = "imagens/";
	        	$tmp = $_FILES['arquivo']['tmp_name'];
	        	$orig = $_FILES['arquivo']['name'];

	        	$novo = uniqid().".$extensao";

	        	$sql =  "UPDATE livros SET imagem = '$novo' WHERE id = '$idlivro'";

	        	$result = \App\Model\Connect::getConn()->query($sql);

	        	if(move_uploaded_file($tmp, "../../View/$pasta".$novo) && $result):
	        		$_SESSION['msg'] = "Atualização Realizada!";
	        	else:
	        		$_SESSION['msg'] = "Erro no upload";
	        	endif;
	                
	 		else:
	 			$_SESSION['msg'] = "Extensão do arquivo inválida";
	 		endif;
	 	else:
	 		$_SESSION['msg'] = "Arquivo maior que 1MB";
		endif;
	endif;

	if(isset($_POST['btn-delete'])):

		$livroDao = new \App\Model\LivroDao();

		$livroDao->delete($idlivro);

		$_SESSION['msg'] = "Deletado com sucesso!";
	endif;

endif;

header('Location: ../../View/Homeadmin/editarlivros.php?pag=1&ini=1');
