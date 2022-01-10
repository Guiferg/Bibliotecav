<?php
	require_once '../includes/header.php';

	session_start();

	if(isset($_SESSION['msg'])):
		?><script type="text/javascript">
					window.onload = function() {
					M.toast({html: '<?php echo $_SESSION['msg']; ?>'});
				};</script><?php

		unset($_SESSION['msg']); 
	endif;
?>

	<!--</header>-->


	<div class="container center" style="margin-top:60px;">
		<div class="row">
			<div class="col s6 m7 offset-m3">

				<form action="../../App/Controller/registro.php" method="POST">
			
			
				<div class="card-panel z-depth-5">
				<center>
					<img src="../imagens/logo2.svg" width="250px">
					<h5 class="center">Registro</h5>
				</center>	 
				<div class="row">
				  <form class="col s12 m12">
				    <div class="row">
				      <div class="input-field col s12 am12">
				      	<i class="fa fa-unlock-alt prefix"><i class="material-icons">person</i></i>
				        <input name="nome" id="icon_prefix" type="text" >
				        <label for="icon_prefix">Nome</label>
				      </div>
				      <div class="input-field col s12 am12">
				      	<i class="fa fa-unlock-alt prefix"><i class="material-icons">person_outline</i></i>
				        <input name="sobrenome" id="icon_prefix" type="text" >
				        <label for="icon_prefix">Sobrenome</label>
				      </div>
				      <div class="input-field col s12 am12">
				      	<i class="fa fa-unlock-alt prefix"><i class="material-icons">email</i></i>
				        <input name="email" id="icon_prefix" type="email" >
				        <label for="icon_prefix">Email</label>
				      </div>
				      <div class="input-field col s12 am12">
				      	<i class="fa fa-unlock-alt prefix"><i class="material-icons">account_circle</i></i>
				        <input name="login" id="icon_prefix" type="text" >
				        <label for="icon_prefix">Login</label>
				      </div>
				      <div class="input-field col s12 m12">
				      	<i class="fa fa-unlock-alt prefix"><i class="material-icons">lock</i></i>
				        <input name="senha1" id="icon_password" type="password" >
				        <label for="icon_password">Senha</label>
				      </div>
				      <div class="input-field col s12 m12">
				      	<i class="fa fa-unlock-alt prefix"><i class="material-icons">lock_outline</i></i>
				        <input name="senha2" id="icon_password" type="password" >
				        <label for="icon_password">Repetir Senha</label>
				      </div>
				    
				        
				    </div>
			</div><!--row-->
			 <center><button class="btn waves-effect waves-light center blue darken-4" type="submit" name="btn-registro">Registrar
			  </button>
			<a href="../" class="btn-small waves-effect lighten-1 red btn">Voltar</a></center>
			  
			</div><!--card-->


		</form>


			</div><!--col-->
 		 </div><!--row-->
	</div><!--conatiner-->
	

<?php
	require_once '../includes/footer.php';