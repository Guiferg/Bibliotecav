<?php 

session_start();

if(isset($_SESSION['msg'])):
		?><script type="text/javascript">
					window.onload = function() {
					M.toast({html: '<?php echo $_SESSION['msg']; ?>'});
				};</script><?php

		unset($_SESSION['msg']); 
endif;

if(isset($_SESSION['idadmin'])):

  require_once '../../vendor/autoload.php';

  $userDao = new \App\Model\UserDao();
  $userDao->collect($_SESSION['idadmin']);

  $nome = basename($_SERVER['PHP_SELF'],'.php');

  
  	$nome = "Cadastro de Livros";

  foreach($userDao->collect($_SESSION['idadmin']) as $user):
    $dados = $user;
  endforeach;

require_once 'includes/header.php'; ?>


	 <main>
	 	<div class="container center">

	 		<div class="row" ></div>

		 	
			<div class="row">
				<div class="col s8 push-s4 z-depth-5 white">

					<form class="" action="../../App/Controller/cadastrolivro.php" enctype="multipart/form-data" method="POST">
						<!--<center>-->
							
							<h2 class="light">Cadastro de livros</h2>

						    <div class="input-field col s12 am12">
						      	<i class="fa fa-unlock-alt prefix"><i class="material-icons">create</i></i>
						        <input name="nome" id="icon_prefix" type="text" >
						        <label for="icon_prefix">Nome</label>
						    </div>
						    <div class="input-field col s12 am12">
						      	<i class="fa fa-unlock-alt prefix"><i class="material-icons">account_box</i></i>
						        <input name="autor" id="icon_prefix" type="text" >
						        <label for="icon_prefix">Autor</label>
						    </div>
						    <div class="input-field col s12 am12">
						      	<i class="fa fa-unlock-alt prefix"><i class="material-icons">format_align_left</i></i>
						        <input name="descricao" id="icon_prefix" type="text" >
						        <label for="icon_prefix">Descrição</label>
						    </div>
						      	
						      	<h5>Qual o Gênero?</h5>
						      	<p>
							      <label>
							        <input class="with-gap" name="group1" type="radio" checked value="1"/>
							        <span class="black-text">Romance</span>
							      </label class="black-text">
							      <label>
							        <input class="with-gap" name="group1" type="radio" value="2" />
							        <span class="black-text">Psicologia</span>
							      </label class="black-text">
							      <label>
							        <input class="with-gap" name="group1" type="radio" value="3" />
							        <span class="black-text">Infantil</span>
							      </label>
							      <label>
							        <input class="with-gap" name="group1" type="radio" value="4" />
							        <span class="black-text">Ficção científica</span>
							      </label>
							       <label>
							        <input class="with-gap" name="group1" type="radio" value="5"  />
							        <span class="black-text">Fantasia</span>
							      </label>
							       <label>
							        <input class="with-gap" name="group1" type="radio" value="6"  />
							        <span class="black-text">Ciências Humanas</span>
							      </label>

							    </p>

						    <div class="row">
								<div class="col s5 push-s1">
									<div class="file-field input-field">
										<div class="btn blue darken-4">
											<span>IMAGEM DO LIVRO</span>
		                            		<input type="file" name="arquivo">
		                     	   		</div>
		                     	   		<div class="file-path-wrapper">
				                            <input class="file-path validate" type="text">
				                        </div>
		                     		</div>
	                     		</div>
                     		</div>

                     		<button class="btn waves-effect waves-light center blue darken-4" type="submit" name="btn-cadastro_livro">Cadastrar
			  				</button>

			  				<div class="row"></div>
						<!--</center>-->
					</form>
	   			</div>
	    	</div>
	    </div>
	 </main>

<?php

	endif;

	require_once 'includes/footer.php';