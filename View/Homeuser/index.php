<?php 

session_start();

if(isset($_SESSION['iduser'])):

  require_once '../../vendor/autoload.php';

  $userDao = new \App\Model\UserDao();

  $livroDao = new \App\Model\LivroDao();

	$livros = $livroDao->read();

	$qlivros= count($livros);

  $nome = "Home";

  foreach($userDao->collect($_SESSION['iduser']) as $user):
    $dados = $user;
  endforeach;

  $livros_do_user = $livroDao->readuser($dados['id']);

	$qlivros_do_user = count($livros_do_user);

require_once 'includes/header.php'; ?>


	 <main>
	 	<div class="container">
	 	<div class="row">
	      <div class="col s9 push-s3">
	      	<div class="row">
	      		<center>
	      			
	      			    <div class="carousel">

	      			  		<h4 class="light white-text">Últimos livros postados</h4>

							    <div class="carousel-item" href="#one!"><img class="responsive-img" src="../imagens/<?php echo $livros[$qlivros-1]['imagem'];?>"></div>
							    <div class="carousel-item" href="#one!"><img class="responsive-img" src="../imagens/<?php echo $livros[$qlivros-2]['imagem'];?>"></div>
							    <div class="carousel-item" href="#one!"><img class="responsive-img" src="../imagens/<?php echo $livros[$qlivros-3]['imagem'];?>"></div>
							    <div class="carousel-item" href="#one!"><img class="responsive-img" src="../imagens/<?php echo $livros[$qlivros-4]['imagem'];?>"></div>
							    <div class="carousel-item" href="#one!"><img class="responsive-img" src="../imagens/<?php echo $livros[$qlivros-5]['imagem'];?>"></div>
						</div>
	      		</center>

	     	</div>
	      </div>
	      <div class="col s3 pull-s9"></div>
	    </div>
	    <div class="row">
	    	<div class="col s9 push-s3">
	    		<div class="row">
	    			<div class="col s4 z-depth-5 blue darken-4">
	    				<center>
	    					<h5 class="light white-text">Multa:</h5>
	    					<h6 class="light white-text"><?php 

								          			require_once '../../App/Controller/calculamulta.php';

													$multa = $dados['multa'];

													for($i = 0; $i < $qlivros_do_user ; $i++){
														$multa += CalculaMulta($livros_do_user[$i]['datealuguel']);
													}

													echo " ".$multa;
								          	?>,00 R$</h6>
	    				</center><br>
	    			</div>
	    			<div class="col s4 z-depth-5 blue darken-4">
	    				<center>
	    					<h5 class="light white-text">Qd. livros alugados:</h5>
	    					<h6 class="light white-text"><?php 

								          			echo $qlivros_do_user;
								          	?></h6>
	    				</center><br>
	    			</div><div class="col s4 z-depth-5 blue darken-4">
	    				<center>
	    					<h5 class="light white-text">Livros para entregar:</h5>
	    					<h6 class="light white-text"><?php 

													for($i = 0; $i < $qlivros_do_user ; $i++){
														if(CalculaMulta($livros_do_user[$i]['datealuguel'])>0):
															echo $livros_do_user[$i]['nome']."<br>";
															$ind = 1;
														endif; }

													if(!isset($ind)):
														echo "Sem pendências";
													endif;
												?></h6>
	    				</center><br>
	    			</div>
	    		</div>
	    	</div>
	    	<div class="col s3 pull-s9"></div>
	    </div>
	   </div>
	 </main>

	 <script>
	 	  document.addEventListener('DOMContentLoaded', function() {
		    var elems = document.querySelectorAll('.carousel');
		    var instances = M.Carousel.init(elems, {

		    	shift: 10,
		    	indicators: true,
		    	dist: -50,
		    });

		  });
	 </script>

<?php

	endif;

	require_once 'includes/footer.php';