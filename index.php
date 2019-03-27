<?php

 ini_set('display_errors',1);
 error_reporting(E_ALL);
 header('Content-Type: text/html; charset=utf-8');


require "autoload.php";
use Validacao;
use ContaCorrente;


$contaJoao = new ContaCorrente("Joao","1212","343477-9",100.00);
$contaMaria = new ContaCorrente("Maria","1212","343423-9",100.00);


echo "<h1>Contas Correntes</h1>";


echo "<h2>Conta Corrente: Titular: ".$contaJoao->getTitular()."</h2>";
var_dump($contaJoao);
try{
  echo "<h3>apos um saque de R$ 20</h3>";
  $contaJoao->sacar(200);

}
catch(\Exceptions\SaldoInsuficienteException $e){

    echo $e->getMessage();

}

var_dump($contaJoao);


try{
  echo "<h3>apos uma Transferencia R$ 20</h3>";
  $contaJoao->transferir(100,$contaMaria);

}catch(\Exceptions\SaldoInsuficienteException $e){

  echo $e->getMessage();
  echo $e->getTrace();

}catch(\Exceptions\OperacaoFinanceiraException $e){
  echo $e->getMessage();
  print_r( $e->getTraceAsString());
  var_dump( $e->getPrevious());

}

var_dump($contaJoao);


try{
  echo "<h3>apos um depósito R$ 20</h3>";
  $contaJoao->depositar(20);

  var_dump($contaJoao);

}catch(\Exception $e){
  echo $e->getMessage();
  echo $e->getTraceAsString();
}
