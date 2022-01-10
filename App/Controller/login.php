<?php

	//inicializações
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "projeto3";

	session_start();

	$connect = mysqli_connect($servername, $username, $password, $db_name);

	if(isset($_POST['btn-login'])):


		if(isset($_SESSION['iduser'])):
			unset($_SESSION['iduser']);
		elseif(isset($_SESSION['idadmin'])):
			unset($_SESSION['idadmin']);
		endif;

		//criar variáveis iniciais
		$erros = array();
		$login = mysqli_escape_string($connect, $_POST['login']);
		$senha = mysqli_escape_string($connect, $_POST['senha']);

		//verificar se login e senha foram escritos
		if(empty($login) or empty($senha)):
			$erros[] = "Preencha todos os campos!<br>";
		else:

			//verificar se login existe no banco de dados
			$sql = "SELECT login FROM users WHERE login = '$login'";
			$result = mysqli_query($connect, $sql);

			if(mysqli_num_rows($result) > 0):

				//se existir login analizar se a senha é equivalente
				$senha = md5($senha);
				$sql = "SELECT * FROM users WHERE login = '$login' AND senha = '$senha'";

				$result = mysqli_query($connect, $sql);

				if(mysqli_num_rows($result)==1):
					
					//se existir, logar como admin, guardar variáveis nas sessões e encaminhar para a home
					$dados = mysqli_fetch_array($result);
					mysqli_close($connect);

					if($dados['tipo']):
						$_SESSION['idadmin'] = $dados['id'];
						header('Location: ../../View/Homeadmin');
					else:
						$_SESSION['iduser'] = $dados['id'];
						header('Location: ../../View/Homeuser');
					endif;
				else:
					$erros[] = "Senha incorreta<br>";
				endif;
			else:
				$erros[] = "Login inexistente<br>";
			endif;
		endif;

		//verificar erros
		if(!empty($erros)):
			$_SESSION['msg']="";
			foreach ($erros as $erro):
				$_SESSION['msg'] = $_SESSION['msg'].$erro;		
			endforeach;
			header('Location: ../../View/');
		endif;

	endif;