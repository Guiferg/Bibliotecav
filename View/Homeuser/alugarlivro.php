<?php 

session_start();

if(isset($_SESSION['msg'])):
		?><script type="text/javascript">
					window.onload = function() {
					M.toast({html: '<?php echo $_SESSION['msg']; ?>'});
				};</script><?php

		unset($_SESSION['msg']); 
	endif;

if(isset($_SESSION['iduser'])):

	//receber pag ini por GET
		$pag = $_GET['pag'];
		$ini = $_GET['ini'];

  require_once '../../vendor/autoload.php';

  $userDao = new \App\Model\UserDao();
  $userDao->collect($_SESSION['iduser']);

  $nome = "Alugar Livro";

  foreach($userDao->collect($_SESSION['iduser']) as $user):
    $dados = $user;
  endforeach;

	require_once 'includes/header.php'; ?>


	 <main>
	 	<div class="container center">

	 		<div class="row" ></div>
		 	
			<div class="row">
				<div class="col s10 push-s3 z-depth-5 white">
					
					<h5 class="light">Lista de Livros</h5>

					<table class="striped">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Capa</th>
								<th>Gênero</th>
								<th>Descrição</th>
								<th>Alugar</th>
							</tr>
						</thead>
						<tbody>

							<?php 

							$livroDao = new \App\Model\LivroDao();
							$livros = $livroDao->read();

							$qlivros= count($livros);

							$tam_page = 4;

							for($i = $tam_page*($pag-1); $i<$tam_page*$pag && $i< $qlivros ; $i++){
							?>
							<tr>
								<td><?php echo $livros[$i]['nome']; ?></td>
								<td><img src="../imagens/<?php echo $livros[$i]['imagem'];?>" width="50 px"></td>
                                <td><?php echo $livros[$i]['nicho'];?></td>
                                <td><a href="#modal<?php echo $livros[$i]['id']; ?>" class="btn modal-trigger"><i class="material-icons">local_library</i></a></td>
                                	 <!-- Modal Structure -->
                                                <div id="modal<?php echo $livros[$i]['id']; ?>" class="modal">
                                                	<br>
                                                	<img src="../imagens/<?php echo $livros[$i]['imagem'];?>" width="150 px">
                                                <div class="modal-content">	
                                                  <h3><?php echo $livros[$i]['nome']; ?></h3>
                                                  <p><?php echo $livros[$i]['descricao'] ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                   	<a href="#!" class="modal-close waves-effect waves-green btn-flat blue white-text">Ok</a>
                                                </div>
                                              </div>

                                <td>

                                	<?php if($livros[$i]['sit']): ?>
                                		<a href="#modal_<?php echo $livros[$i]['id']; ?>" class="btn yellow modal-trigger"><i class="material-icons">assignment_returned</i></a>
                                	<?php else: ?>
                                		<p>Não disponível</p>
                                	<?php endif; ?>
                                </td>

                                	<!-- Modal Structure -->
                                	<div id="modal_<?php echo $livros[$i]['id']; ?>" class="modal">
                                                <div class="modal-content">
                                                  <p>Quer mesmo alugar este livro?</p>
                                                </div>
                                                <div class="modal-footer">
                                            
                                                  <form action="../../App/Controller/aluguel.php" method = "POST">
                                                  	<input type="hidden" name="multa" value="<?php echo $dados['multa']; ?>">
                                                    <input type="hidden" name="idlivro" value="<?php echo $livros[$i]['id'] ?>">
                                                    <button type="submit" name="btn-alugar" id="btn-delete" class="btn green">Sim</button>
                                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                                  </form>
                                                </div>
                                              </div>


							</tr>

							<?php } ?>

							<ul class="pagination">
							    <li class="waves-effect"><a href="alugarlivro.php?pag=<?php if($ini>1): echo $pag."&ini=".($ini-1); else: echo $pag."&ini=1"; endif;?>"><i class="material-icons">chevron_left</i></a></li>

							    <?php for($i = $ini ; $i < $ini + 5 ; $i++) {?>
							    	<li class="<?php if($i == $pag): echo "active"; else: echo "waves-effect"; endif;?>"><a href="alugarlivro.php?pag=<?php echo $i."&ini=".$ini; ?>"><?php echo $i ?></a></li>
							    <?php } ?>


							    <li class="waves-effect"><a href="alugarlivro.php?pag=<?php echo $pag."&ini=".($ini+1);?>"><i class="material-icons">chevron_right</i></a></li>
						  	</ul>
						</tbody>
					</table>

  				</div>
		  	</div>
		</div>
	</main>

<?php

	endif;

	require_once 'includes/footer.php';