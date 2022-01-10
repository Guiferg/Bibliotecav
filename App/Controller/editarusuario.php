<?php

namespace App\Model;
require_once '../../vendor/autoload.php';
session_start();

if(isset($_SESSION['idadmin'])):

	$idusuario = $_POST['idusuario'];

	if(isset($_POST['btn-edit'])):

		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$login = $_POST['login'];

		$senha = md5($_POST['senha']);

		$user = new \App\Model\User($nome, $email, $login, $senha);

		$UserDao = new \App\Model\UserDao();

		$UserDao->update($user, $idusuario);

		//carregar foto
	endif;

	if(isset($_POST['btn-delete'])):

		$UserDao = new \App\Model\UserDao();

		$UserDao->delete($idusuario);

		$_SESSION['msg'] = "Deletado com sucesso!";
	endif;

endif;

header('Location: ../../View/Homeadmin/editarusuario.php?pag=1&ini=1');
