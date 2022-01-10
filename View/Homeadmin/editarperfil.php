<?php 

session_start();

if(isset($_SESSION['idadmin'])):

	if(isset($_SESSION['msg'])):
		?><script type="text/javascript">
					window.onload = function() {
					M.toast({html: '<?php echo $_SESSION['msg']; ?>'});
				};</script><?php

		unset($_SESSION['msg']); 
	endif;

  require_once '../../vendor/autoload.php';

  $userDao = new \App\Model\UserDao();
  $userDao->collect($_SESSION['idadmin']);

 	$nome = "Editar Perfil";

  foreach($userDao->collect($_SESSION['idadmin']) as $user):
    $dados = $user;
  endforeach;

require_once 'includes/header.php'; ?>


	 <main>
	 	<div class="row z-depth-5">
	      <div class="col s9 push-s3">
	      	<div class="row"><center><h4><?php echo $dados['nome']; ?></h4></center></div>
			   <div class="row">
				   	<div class="col s6 ">
					   	<img src="../imagens/<?php echo $dados['foto']; ?>" class=" circle responsive-img right" width="200px">
				   	</div>
				   	<div class="col">
				   		<br>
				   		<form action="../../App/Controller/uploadfoto.php" enctype="multipart/form-data" method="POST">
		                  <div class="file-field input-field">
                        <div class="btn blue darken-4">
                            <span>Escolher Foto</span>
                            <input type="file" name="arquivo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                        <div class="file-field input-field">
                       		 <input type="submit" name="enviar-formulario" class="btn green">
                    	</div>
                   		 </div>
                   		</form>
					</div>
			  </div>
	     	</div>
	      <div class="col s3 pull-s9"></div>
	    </div>  
	   <div class="row">
			<div class="col s4 m5 push-m5 white">
				<center>
				<h3 class="light">Editar Perfil</h3>
				</center>
				<form action="../../App/Controller/update.php" method="POST">

					<input type="hidden" name="id" value = "<?php echo $dados['id'] ?>">

					<div class="input-field col s12">
						<input type="email" value = "<?php echo $dados['email']; ?>" name="email" id="email" >
						<label for="email">Email</label>
					</div>
					<div class="input-field col s12">
						<input type="text" value = "<?php echo $dados['login']; ?>" name="login" id="login" >
						<label for="login">Login</label>
					</div>
					<div class="input-field col s12">
						<input type="password" value = "" name="senha1" id="senha" >
						<label for="senha">Nova senha</label>
					</div>

					<div class="input-field col s12">
						<input type="password" value = "" name="senha2" id="senha" >
						<label for="senha">Repetir nova senha</label>
					</div>

					<div class="input-field col s12">
						<input type="password" value = "" name="senhaat" id="senha" >
						<label for="senha">Senha atual</label>
					</div>

					<center><button type="submit" name='btn-editar' class="btn sm blue darken-4"> Atualizar </button></center>
					<br>
				</form>
			</div>
		</div>
	 </main>

<?php

	endif;

	require_once 'includes/footer.php';