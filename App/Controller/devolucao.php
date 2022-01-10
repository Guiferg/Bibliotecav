<?php

session_start();

require_once '../../vendor/autoload.php';
require_once 'calculamulta.php';

if(isset($_SESSION['iduser']) && isset($_POST['btn-devolver'])):

	$idlivro = $_POST['idlivro'];

	// Livro Devolvido!

	$livroDao = new \App\Model\LivroDao();

	$userDao = new \App\Model\UserDao();

	foreach($livroDao->collect($idlivro) as $livro):
   		$dados1 = $livro;
 	endforeach;

	foreach($userDao->collect($_SESSION['iduser']) as $user):
   		$dados = $user;
 	endforeach;

 	$valor = $dados['multa']+CalculaMulta($dados1['datealuguel']);

	$userDao->somamulta($valor , $_SESSION['iduser']);

	$livroDao->devolve($idlivro);

	$_SESSION['msg'] = "Livro Devolvido!";

	header('Location: ../../View/Homeuser/devolverlivro.php');

endif;