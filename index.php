<?php

ini_set('display_errors',1);

require_once "autoload.php";


use Entity\Cliente;

use Entity\ContaCorrente;




class Main{



	public function Main(){
		

		$contaCorrente = new ContaCorrente();

		$contaCorrente->titular = "joao";
		$contaCorrente->agencia = "5199";
		$contaCorrente->numero = "163212";
		$contaCorrente->saldo = "100000";


		Self::dump($contaCorrente); 


	}


	private static function dump($value){

		echo "<pre>";
		print_r($value);
		echo "</pre>";

	}
}


new Main();

?>