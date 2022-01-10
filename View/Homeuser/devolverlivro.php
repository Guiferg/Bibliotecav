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
    require_once '../../vendor/autoload.php';

    $userDao = new \App\Model\UserDao();
    $userDao->collect($_SESSION['iduser']);

    $nome = "Devolver Livro";

  foreach($userDao->collect($_SESSION['iduser']) as $user):
    $dados = $user;
  endforeach;

	require_once 'includes/header.php'; ?>

	<main>
		<div class="container center">
			<div class="row"></div>

			<div class="row">
				<div class="col s10 push-s3 z-depth-5 white">
					<h5 class="light">Meus livros Alugados</h5>

					<table class="striped">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Capa</th>
								<th>Gênero</th>
								<th>Descrição</th>
								<th>Devolver</th>
							</tr>
						</thead>
						<tbody>

							<?php 

							$livroDao = new \App\Model\LivroDao();
							$livros = $livroDao->readuser($dados['id']);

							$qlivros = count($livros);

							for($i = 0; $i < $qlivros ; $i++){
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
                                		<a href="#modal_<?php echo $livros[$i]['id']; ?>" class="btn red lighten-2 modal-trigger"><i class="material-icons">arrow_upward</i></a>
                                </td>

                                	<!-- Modal Structure -->
                                	<div id="modal_<?php echo $livros[$i]['id']; ?>" class="modal">
                                                <div class="modal-content">
                                                  <p>Quer mesmo devolver este livro?</p>
                                                </div>
                                                <div class="modal-footer">
                                            
                                                  <form action="../../App/Controller/devolucao.php" method = "POST">
                                                    <input type="hidden" name="idlivro" value="<?php echo $livros[$i]['id'] ?>">
                                                    <button type="submit" name="btn-devolver" class="btn green">Sim</button>
                                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                                  </form>
                                                </div>
                                              </div>


							</tr>

							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>


<?php

	endif;

	require_once 'includes/footer.php';