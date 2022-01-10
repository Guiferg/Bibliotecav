<?php

session_start();
require_once '../../vendor/autoload.php';

if(isset($_SESSION['iduser']) && isset($_POST['btn-pagarmulta'])){

	$livroDao = new \App\Model\LivroDao();

	$livros_do_user = $livroDao->readuser($_SESSION['iduser']);

	if ( count($livros_do_user) == 0 ){
		$_SESSION['msg'] = "Pagamento Realizado";

		$userDao = new \App\Model\UserDao();

		$userDao->pagarmulta($_SESSION['iduser']);
	}
	else{

		$_SESSION['msg'] = "Devolva os livros antes de fazer o pagamento";
	}

}

header('Location: ../../View/Homeuser/multas.php');