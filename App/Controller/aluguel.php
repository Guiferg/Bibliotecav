<?php

session_start();

require_once '../../vendor/autoload.php';

if(isset($_SESSION['iduser']) && isset($_POST['btn-alugar'])):

	$iduser = $_SESSION['iduser'];
	$idlivro = $_POST['idlivro'];
	$multa = $_POST['multa'];

	$livroDao = new \App\Model\LivroDao();
	$userDao = new \App\Model\UserDao();

	$livros_do_user = $livroDao->readuser($iduser);

	$qlivros = count($livros_do_user);

	if($qlivros < 3):
		if($multa == 0):
			$livroDao->alugue($iduser, $idlivro);
			$_SESSION['msg']="Livro alugado!";
		else:
			$_SESSION['msg']="Você está com multa!";
		endif;
	else:
		$_SESSION['msg']="Você só pode alugar até 3 livros!";
	endif;

endif;

header('Location: ../../View/Homeuser/alugarlivro.php?pag=1&ini=1');