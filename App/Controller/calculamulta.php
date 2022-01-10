<?php

function CalculaMulta($data) {

	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y/m/d');

	$firstDate  = new DateTime($data);
	$secondDate = new DateTime($date);
	$intvl = $firstDate->diff($secondDate);

	$dias = $intvl->days;

	if( $dias <=3 ):
		return 0;
	else:
		return $dias-3;
	endif;
}