<?php
	
	namespace App\Model;

	//inicializações

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "projeto3";

	$connect = mysqli_connect($servername, $username, $password, $db_name);


	session_start();

	if(isset($_SESSION['idadmin'])):
		$usuario = $_SESSION['idadmin'];
		$header = 1;
	else:
		$usuario = $_SESSION['iduser'];
		$header = 0;
	endif;
	
	if(isset($_POST['enviar-formulario'])): 

        $formatosPermitidos = array("png", "jpeg", "jpg", "gif", "jfif");

        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

        //verificar se o tamanho do arquivo é manor que 1MB
        if(filesize($_FILES['arquivo']['tmp_name'])<1048576):
	        if(in_array($extensao, $formatosPermitidos)):

	        	$pasta = "imagens/";
	        	$tmp = $_FILES['arquivo']['tmp_name'];
	        	$orig = $_FILES['arquivo']['name'];

	        	$novo = uniqid().".$extensao";

	        	$id = $usuario;

	        	$sql =  "UPDATE users SET foto = '$novo' WHERE id = '$id'";

	        	if(move_uploaded_file($tmp, "../../View/$pasta".$novo) && mysqli_query($connect, $sql)):
	        		$_SESSION['msg'] = "Upload realizado com sucesso";
	        	else:
	        		$_SESSION['msg'] = "Erro no upload";
	        	endif;
	                
	 		else:
	 			$_SESSION['msg'] = "Extensão do arquivo inválida";
	 		endif;
	 	else:
	 		echo $_SESSION['msg'] = "Arquivo maior que 1MB";
	 	endif;
    endif;

    if(!$header):
		header('Location: ../../View/Homeuser/editarperfil.php');
	else:
		header('Location: ../../View/Homeadmin/editarperfil.php');
	endif;