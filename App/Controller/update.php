<?php
//inicializações
namespace App\Model;
session_start();

if(isset($_SESSION['idadmin'])):
	$usuario = $_SESSION['idadmin'];
	$header = 1;
else:
	$usuario = $_SESSION['iduser'];
	$header = 0;
endif;

//conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "projeto3";

$connect = mysqli_connect($servername, $username, $password, $db_name);

require_once '../../vendor/autoload.php';

  $userDao = new \App\Model\UserDao();
  $userDao->collect($usuario);

  foreach($userDao->collect($usuario) as $user):
    $dados = $user;
  endforeach;

  function clear($input){
	global $connect;

	$var = mysqli_escape_string($connect, $input);

	$var = htmlspecialchars($var);
	return $var;
}


if(isset($usuario)):
	if(isset($_POST['btn-editar'])):

		//Botão para limpar entradas de ataques com scripts
		$email = clear($_POST['email']);
		$login = clear($_POST['login']);
		$senha1 = clear($_POST['senha1']);
		$senha2 = clear($_POST['senha2']);
		$senhaat = clear($_POST['senhaat']);

		$senhaat = md5($senhaat);

		//codificar senha pra update

		if($senha1 == $senha2 && $senhaat = $dados['senha'] && $senha1 != ""):

			$senha = md5($senha1);

			$id = $dados['id'];

			///atualização no banco de dados
			$sql = "UPDATE users SET email = '$email', login = '$login', senha = '$senha' WHERE id = '$id'";

			if(mysqli_query($connect, $sql)):
				$_SESSION['msg'] = "Atualização feita!";

			else:
				$_SESSION['msg'] = "Erro ao atualizar!";
			endif;
		else:
			$_SESSION['msg'] = "Erro ao atualizar!";
		endif;
	endif;
endif;

if(!$header):
	header('Location: ../../View/Homeuser/editarperfil.php');
else:
	header('Location: ../../View/Homeadmin/editarperfil.php');
endif;