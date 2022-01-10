<?php 

session_start();

if(isset($_SESSION['idadmin'])):

	require_once '../../vendor/autoload.php';

	$userDao = new \App\Model\UserDao();
	$userDao->collect($_SESSION['idadmin']);

	$nome = basename($_SERVER['PHP_SELF'],'.php');

	$nome = "Home";

	foreach($userDao->collect($_SESSION['idadmin']) as $user):
	  $dados = $user;
	endforeach;

	$livroDao = new \App\Model\LivroDao();
	$livros = $livroDao->read();

	$nicho = [];
	$livros_alugados = 0;

	$nicho['Romance'] = 0;
	$nicho['Psicologia'] = 0;
	$nicho['Infantil'] = 0;
	$nicho['Ficção científica'] = 0;
	$nicho['Fantasia'] = 0;
	$nicho['Ciências Humanas'] = 0;

	date_default_timezone_set('America/Sao_Paulo');
	$data = new DateTime();
	$data1 = new DateTime(date('Y/m/d', strtotime('-1 days')));
	$data2 = new DateTime(date('Y/m/d', strtotime('-2 days')));
	$data3 = new DateTime(date('Y/m/d', strtotime('-3 days')));
	$data4 = new DateTime(date('Y/m/d', strtotime('-4 days')));

	$data_ = 0;
	$data_1 = 0;
	$data_2 = 0;
	$data_3 = 0;
	$data_4 = 0;

	for( $i = 0; $i < count($livros); $i++ ){
		$nicho[$livros[$i]['nicho']]++;

		$DAT = $livros[$i]['datealuguel'];

		if( $livros[$i]['sit'] == 0 ){
			$livros_alugados++;

			if( $DAT == $data->format('Y-m-d')):
				$data_++;
			elseif( $DAT == $data1->format('Y-m-d')):
				$data_1++;
			elseif( $DAT == $data2->format('Y-m-d')):
				$data_2++;
			elseif( $DAT == $data3->format('Y-m-d')):
				$data_3++;
			elseif( $DAT == $data4->format('Y-m-d')):
				$data_4++;
			endif;
		}

	}

	require_once 'includes/header.php'; ?>


	 <main>

		 	
			<div class="row">
				<div class="col s9 push-s3">
					<center><h3 class="light white-text">Administração</h3></center>
					<div class="col s6 z-depth-5">
						<div id="curve_chart2" style="width: 450px; height: 250px"></div>
					</div>
					<div class="col z-depth-5">
						<div id="piechart" style="width: 450px; height: 250px"></div>
					</div>
				</div>
				<div class="col s3 pull-s9"></div>
			</div>
			<div class="row">
				<div class="col s9 push-s3 ">
					<div class="container center">
						<div class="row">
							<div class="col s6 push-2 z-depth-5">
								<center>
									<div id="donutchart" style="width: 700px; height: 330px;"></div>
								</center>
							</div>
							
						</div>

					</div>
				</div>
				<div class="col s3 pull-s9"></div>
			</div>
	</main>

<?php

	endif;

	require_once 'includes/footer.php';