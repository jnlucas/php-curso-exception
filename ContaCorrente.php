<?php


class ContaCorrente{

	private $titular;

	public  $agencia;

	private $numero;

	private $saldo;

	private $contadorTransferenciasNaoPermitidas;

	private $contadorSaquesNaoPermitidos;

	private static $totalContasCriadas;

	private static $taxaOperacao;



	public function __construct($titular,$agencia,$numero,$saldo){

		if($agencia <= 0){

			throw new \InvalidArgumentException( "O argumento agencia deve ser maior que 0");

		}
		if($numero <= 0){

			throw new \InvalidArgumentException( "O argumento numero deve ser maior que 0");

		}

		$this->titular = $titular;
		$this->agencia = $agencia;
		$this->numero = $numero;
		$this->saldo = $saldo;

		self::$totalContasCriadas ++;
		self::$taxaOperacao = 30 / self::$totalContasCriadas;


	}




	public function __get($atributo){

		Validacao::protegeAtributo($atributo);

		return $this->$atributo;

	}


	public function __set($atributo,$valor){

		Validacao::protegeAtributo($atributo);

		$this->$atributo = $valor;

	}

	public function transferir($valor, ContaCorrente $contaCorrente){


		Validacao::verificaNumerico($valor);
		if($valor <= 0){
			throw new \InvalidArgumentException("Valor inválido para transferencia");
		}
		try{
			$this->sacar($valor);

		}catch(\Exceptions\SaldoInsuficienteException $e){
				$this->contadorTransferenciasNaoPermitidas ++;

				throw new \Exceptions\OperacaoFinanceiraException("Operação não realizada", $e->getCode(),$e );

		}

		$contaCorrente->depositar($valor);

		$this->logarTransferencia();

		return $this;

	}

	private function logarTransferencia(){

			try{
					$leitor = new LeitorDeArquivo("contas.txt");

					$leitor->letProximaLinha();
					$leitor->letProximaLinha();
					$leitor->letProximaLinha();

			}catch(\Exception $e){
					echo "exeção so ler arquivo";

			}finally{
				$leitor->fechar();
			}


	}

	public function getTitular(){
		return $this->titular;
	}

	public function sacar($valor){

			Validacao::verificaNumerico($valor);

			if($this->saldo <= 0 || $this->saldo < $valor){
				$this->contadorSaquesNaoPermitidos ++;
				throw new \Exceptions\SaldoInsuficienteException("O saldo é insuficiente!");

			}

			$this->saldo = $this->saldo - $valor;
			return $this;


	}

	public function depositar($valor){

		Validacao::verificaNumerico($valor);

		$this->saldo = $this->saldo + $valor;
		return $this;

	}



	public function setNumero($numero){
		return $this->numero = $numero;
	}





	private function formataSaldo(){

		return "R$ ".number_format($this->saldo,2,",",".");
	}


	public function getSaldo(){
		return $this->formataSaldo();
	}

	public function __toString(){

		return $this->saldo;
	}


}
