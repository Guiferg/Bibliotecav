<?php 

session_start();

if(isset($_SESSION['iduser'])):

	if(isset($_SESSION['msg'])):
		?><script type="text/javascript">
					window.onload = function() {
					M.toast({html: '<?php echo $_SESSION['msg']; ?>'});
				};</script><?php

		unset($_SESSION['msg']); 
	endif;

  require_once '../../vendor/autoload.php';

  $userDao = new \App\Model\UserDao();

  $livroDao = new \App\Model\LivroDao();

  $nome = "Multas";

  foreach($userDao->collect($_SESSION['iduser']) as $user):
    $dados = $user;
  endforeach;

  $livros_do_user = $livroDao->readuser($dados['id']);

	$qlivros_do_user = count($livros_do_user);

require_once 'includes/header.php'; ?>


	 <main>
	 	<div class="container center">
		 	<div class="row">
		 		<br>
		      <div class="col s9 push-s3">
		      	<div class="row">
		      		<div class="col s6 z-depth-5 white">
		      			<div class="row">
		      			<center>
		      				<h5 class=" blue-text text-darken-4 light">Multa total:<?php 

								          			require_once '../../App/Controller/calculamulta.php';

													$multa = $dados['multa'];

													for($i = 0; $i < $qlivros_do_user ; $i++){
														$multa += CalculaMulta($livros_do_user[$i]['datealuguel']);
													}

													echo " ".$multa;
								          	?>,00 R$<br></h5><br>
								  <form action="../../App/Controller/pagarmulta.php" method="POST">
		      					<button type="submit" name='btn-pagarmulta' class="btn btn-large blue darken-4 white-text"> Pagar Multa </button>
		      				</form>
		      			</center></div>
		      		</div>
		      		<div class="col s6 push-s1 z-depth-5 white">
		      			<div class="row">
		      			<center>
			      			<h5 class=" blue-text text-darken-4 light">Mensagem para administrção:</h5><br>
			      				<button class="btn-large blue darken-4 light">Enviar Mensagem</button>
			      			</center>
			      		</div>
		      		</div>
		      	</div>
		      </div>
		      <div class="col s3 pull-s9"></div>
		    </div>
		    <div class="row">
		    	 <div class="col s10 push-s3 z-depth-5 white">
					<h5 class="light">Livros com Pendência</h5>

					<table class="striped">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Capa</th>
								<th>Data da aquisição</th>
								<th>Data de vencimento</th>
								<th>Multa Acumula</th>
							</tr>
						</thead>
						<tbody>

							<?php 

							for($i = 0; $i < $qlivros_do_user ; $i++){
								if( CalculaMulta($livros_do_user[$i]['datealuguel']) > 0):
							?>
							<tr>
								<td><?php echo $livros_do_user[$i]['nome']; ?></td>
								<td><img src="../imagens/<?php echo $livros_do_user[$i]['imagem'];?>" width="50 px"></td>
                                <td><?php
                                	echo implode("/",array_reverse(explode("-",$livros_do_user[$i]['datealuguel']))); 
                            	?></td>

                                <td><?php
                                $q =3;
                                	echo date('d/m/Y', strtotime("+{$q} days",strtotime($livros_do_user[$i]['datealuguel'])));	
                                ?></td>

                                <td><p class="red-text"><?php
                                	echo CalculaMulta($livros_do_user[$i]['datealuguel']).",00 R$";
                                ?></p></td>


							</tr>

							<?php endif; } ?>
						</tbody>
					</table>
				</div>
		    </div>
		      
		</div>
	 </main>


<?php

	endif;

	require_once 'includes/footer.php';