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

	//receber pag ini por GET
		$pag = $_GET['pag'];
		$ini = $_GET['ini'];

  require_once '../../vendor/autoload.php';

  $userDao = new \App\Model\UserDao();
  $userDao->collect($_SESSION['idadmin']);

  $nome = "Editar Usuário";

  foreach($userDao->collect($_SESSION['idadmin']) as $user):
    $dados = $user;
  endforeach;

	require_once 'includes/header.php'; ?>


	 <main>
	 	<div class="container center">

	 		<div class="row" ></div>
		 	
			<div class="row">
				<div class="col s10 push-s3 z-depth-5 white">
					
					<h5 class="light">Lista de Usuários</h5>

					<table class="striped">
						<thead>
							<tr>
								<th>Foto</th>
								<th>Nome</th>
								<th>Email</th>
								<th>Editar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>

							<?php 

							$usuarios = $userDao->read();

							$qusuarios= count($usuarios);

							$tam_page = 4;

							for($i = $tam_page*($pag-1); $i<$tam_page*$pag && $i< $qusuarios ; $i++){
								if(!$usuarios[$i]['tipo']):
							?>
							<tr>
								
								<td><center><img src="../imagens/<?php echo $usuarios[$i]['foto']; ?>" class="responsive-img circle" width="70px"></center></td>
								<td><?php echo $usuarios[$i]['nome'];?></td>
								<td><?php echo $usuarios[$i]['email'];?></td>
								<td>
									<a href="#modal_<?php echo $usuarios[$i]['id']; ?>" class="btn blue modal-trigger"><i class="material-icons">border_color</i></a>
								</td>

								<div id="modal_<?php echo $usuarios[$i]['id']; ?>" class="modal">
                                                <div class="modal-content">
                                                  <p>Informe os dados para edição:</p>
                                                  <form action="../../App/Controller/editarusuario.php" method = "POST" >
                                                    <input type="hidden" name="idusuario" value="<?php echo $usuarios[$i]['id'] ?>">


                                                    				<div class="input-field col s12 am12">
																	<i class="fa fa-unlock-alt prefix"><i class="material-icons">create</i></i>
																	 <input name="nome" id="icon_prefix" type="text" value="<?php echo $usuarios[$i]['nome'];?>" >
																	  <label for="icon_prefix">Nome</label>
																	</div>
																	 <div class="input-field col s12 am12">
																		<i class="fa fa-unlock-alt prefix"><i class="material-icons">account_box</i></i>
																	  <input name="email" id="icon_prefix" type="email" value="<?php echo $usuarios[$i]['email'];?>" >
																	 <label for="icon_prefix">Email</label>
																	  </div>
																	<div class="input-field col s12 am12">
																	<i class="fa fa-unlock-alt prefix"><i class="material-icons">format_align_left</i></i>
																		 <input name="login" id="icon_prefix" type="text"  value="<?php echo $usuarios[$i]['login'];?>">
																	 <label for="icon_prefix">Login</label>
																	 </div>
																	 <div class="input-field col s12 am12">
																	<i class="fa fa-unlock-alt prefix"><i class="material-icons">format_align_left</i></i>
																		 <input name="senha" id="icon_prefix" type="password">
																	 <label for="icon_prefix">Senha</label>
																	 </div>
                                                    <button type="submit" name="btn-edit" id="btn-edit" class="btn green">Sim</button>
                                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                                  </form>
                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                    </div>

                                    <td>
                                    	<a href="#modal__<?php echo $usuarios[$i]['id']; ?>" class="btn red modal-trigger"><i class="material-icons">cancel</i></a>
                                    </td>

                                    <div id="modal__<?php echo $usuarios[$i]['id']; ?>" class="modal">
                                                <div class="modal-content">
                                                  <p>Quer mesmo excluir este usuário?</p>
                                                </div>
                                                <div class="modal-footer">
                                            
                                                  <form action="../../App/Controller/editarusuario.php" method = "POST">
                                                    <input type="hidden" name="idusuario" value="<?php echo $usuarios[$i]['id'] ?>">
                                                    <button type="submit" name="btn-delete" id="btn-delete" class="btn green">Sim</button>
                                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                                  </form>
                                                </div>
                                    </div>

							</tr>

							<?php endif; } ?>

							<ul class="pagination">
							    <li class="waves-effect"><a href="editarusuario.php?pag=<?php if($ini>1): echo $pag."&ini=".($ini-1); else: echo $pag."&ini=1"; endif;?>"><i class="material-icons">chevron_left</i></a></li>

							    <?php for($i = $ini ; $i < $ini + 5 ; $i++) {?>
							    	<li class="<?php if($i == $pag): echo "active"; else: echo "waves-effect"; endif;?>"><a href="editarusuario.php?pag=<?php echo $i."&ini=".$ini; ?>"><?php echo $i ?></a></li>
							    <?php } ?>


							    <li class="waves-effect"><a href="editarusuario.php?pag=<?php echo $pag."&ini=".($ini+1);?>"><i class="material-icons">chevron_right</i></a></li>
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