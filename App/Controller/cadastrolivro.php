<?php

namespace App\Model;
require_once '../../vendor/autoload.php';
session_start();

if(isset($_SESSION['idadmin'])):

	if(isset($_POST['btn-cadastro_livro'])):

		if($_POST['group1']=="1"):
			$nicho = "Romance";
		elseif($_POST['group1']=="2"):
			$nicho = "Psicologia";
		elseif($_POST['group1']=="3"):
			$nicho = "Infantil";
		elseif($_POST['group1']=="4"):
			$nicho = "Ficção científica";
		elseif($_POST['group1']=="5"):
			$nicho = "Fantasia";
		elseif($_POST['group1']=="6"):
			$nicho = "Ciências Humanas";
		endif;

		//carregar informacoes do post

		$nome = $_POST['nome'];
		$autor = $_POST['autor'];
		$descricao = $_POST['descricao'];

		$livro = new \App\Model\Livro($nome, $autor, $nicho, $descricao);

		$livroDao = new \App\Model\LivroDao();

		$livroDao->create($livro);

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

	        	$id = $livro->getId();

	        	$sql =  "UPDATE livros SET imagem = '$novo' WHERE id = '$id'";

	        	$result = \App\Model\Connect::getConn()->query($sql);

	        	if(move_uploaded_file($tmp, "../../View/$pasta".$novo) && $result):
	        		$_SESSION['msg'] = "Cadastro Realizado";
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
endif;

header('Location: ../../View/Homeadmin/cadastrarlivro.php');