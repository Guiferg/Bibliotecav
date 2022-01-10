<?php

require_once '../../vendor/autoload.php';
//namespace App\Model;
//inicializações
session_start();

//função para defender entradas da scripts
/*function clear($input){
	global $connect;

	$var = mysqli_escape_string(, $input);

	$var = htmlspecialchars($var);
	return $var;
}*/


if(isset($_POST['btn-registro'])):

	//limpando entradas
	$nome = ($_POST['nome']);
	$sobrenome = ($_POST['sobrenome']);
	$email = ($_POST['email']);
	$login = ($_POST['login']);
	$senha1 = ($_POST['senha1']);
	$senha2 = ($_POST['senha2']);


	if( !strlen($senha1) || !strlen($email) || !strlen($login) || !strlen($nome)|| !strlen($sobrenome)||!strlen($senha2)):
		$_SESSION['msg'] = "Preencha todos os campos!";
	elseif(filter_input(INPUT_POST, $email, FILTER_VALIDATE_EMAIL)):
		$_SESSION['msg'] = "Email inválido";
	elseif($senha1!=$senha2):
		$_SESSION['msg'] = "Senhas não coincidentes";
	else:

		//codificando a senha
		$senha1 = md5($senha1);

		$Nome = $nome.' '.$sobrenome;

		$user = new \App\Model\User($Nome, $email, $login, $senha1);

		$userDao = new \App\Model\UserDao();

		$userDao->create($user);

		$_SESSION['msg'] = "Registro Concluído";
	endif;
endif;
 
header('Location: ../../View/registro');