<?php


class ContaCorrente{


	public $titular;
	
	public $agencia;
	
	public $numero;
	
	private $saldo;

	public $ultimaOperacao;




	public function __construct($titular = null,$agencia = null,$numero = null,  $saldo = null){

		$this->titular = $titular;
		$this->agencia = $agencia;
		$this->numero = $numero;
		$this->saldo = $saldo;


	}


	public function getSaldo(){

		return $this->formataSaldo($this->saldo);
	}


	public function setSaldo($saldo){

		$this->saldo = $saldo;

		return $this;
	}


	/**
	* Formata saldo do titular da conta adicionando casas decimais de moeda
	* @param Int $saldo
	* @return String $saldo
	*
	**/
	private function formataSaldo($saldo){

		return "R$ ".number_format($saldo, 2, ',', '.');
	}



	public function __toString(){

		return $this->titular." - ".$this->agencia."-".$this->numero." Saldo: ".$this->getSaldo()." ".$this->ultimaOperacao."<br />";
	}


	public function sacar($valor){

		$this->saldo = $this->saldo - $valor;

		$this->ultimaOperacao = "Efetuou Saque de {$this->formataSaldo($valor)} <br />";


		return $this;



	}

	public function depositar($valor){

		$this->saldo = $this->saldo + $valor;
		$this->ultimaOperacao = "Efetuou Deposito  {$this->formataSaldo($valor)}<br />";
		

		return $this;

	}

	public function transferir($valor, ContaCorrente $conta){

		$this->sacar($valor);

		$conta->depositar($valor);

		$this->ultimaOperacao = "Efetuou Transferencia  {$this->formataSaldo($valor)} <br />";
		

	}








}
?>