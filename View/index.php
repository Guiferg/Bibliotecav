<?php

	session_start();

	if(isset($_SESSION['msg'])):
		?><script type="text/javascript">
					window.onload = function() {
					M.toast({html: '<?php echo $_SESSION['msg']; ?>'});
				};</script><?php

		unset($_SESSION['msg']); 
	endif;

	require_once 'includes/header.php';
?>

	<!--</header>-->


	<div class="container" style="margin-top:90px;">
		<div class="row">
			<div class="col s12 m6 offset-m3">

				<form action="../App/Controller/login.php" method="POST">
			
			
				<div class="card-panel z-depth-5">
				<center>
					<img src="imagens/logo2.svg" width="250px">
					<h5 class="center">Login</h5>
				</center>	 
				<div class="row">
				  <form class="col s12 m12">
				    <div class="row">
				      <div class="input-field col s12 am12">
				      	<i class="fa fa-unlock-alt prefix"><i class="material-icons">person</i></i>
				        <input name="login" id="icon_prefix" type="text" class="validate">
				        <label for="icon_prefix">Login</label>
				      </div>
				      <div class="input-field col s12 m12">
				      	<i class="fa fa-unlock-alt prefix"><i class="material-icons">lock_open</i></i>
				        <input name="senha" id="icon_password" type="password" class="validate">
				        <label for="icon_password">Senha</label>
				      </div>
				    
				        
				    </div>
			</div><!--row-->
			 <center><button class="btn waves-effect waves-light center blue darken-4" type="submit" name='btn-login'>Entrar
			  </button>
			<a href="registro/" class="btn-small waves-effect center green btn">Registre-se</a></center>
			  
			</div><!--card-->


		</form>


</div><!--col-->
  </div><!--row-->
	</div><!--conatiner-->
	

<?php
	require_once 'includes/footer.php';