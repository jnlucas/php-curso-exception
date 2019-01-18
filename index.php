<?php

 ini_set('display_errors',1);
 error_reporting(E_ALL);
 header('Content-Type: text/html; charset=utf-8');



require "Validacao.php";
require "ContaCorrente.php";




$contaJoao = new ContaCorrente("Joao","1212","343477-9",2000.00);
$contaMaria = new ContaCorrente("Maria","1212","343423-9",6000.00);



echo "<h1>Contas Correntes</h1>";



echo "<h2>Conta Corrente: Titular: ".$contaJoao->getTitular()."</h2>";
var_dump($contaJoao);

echo "<h3>apos um saque de R$ 20</h3>";
$contaJoao->sacar(20);

var_dump($contaJoao);

echo "<h3>apos um depósito R$ 20</h3>";
$contaJoao->depositar(20);

var_dump($contaJoao);

echo "<h3>apos uma Transferencia R$ 20</h3>";
$contaJoao->transferir(20,$contaMaria);

var_dump($contaJoao);


echo "<h2>Conta Corrente: Titular: ".$contaMaria->getTitular()."</h2>";
var_dump($contaMaria);

echo "<h3>apos um saque de R$ 20</h3>";
$contaMaria->sacar(20);

var_dump($contaMaria);

echo "<h3>apos um depósito R$ 20</h3>";
$contaMaria->depositar(20);

var_dump($contaMaria);

echo "<h3>apos uma Transferencia R$ 20</h3>";
$contaMaria->transferir(20,$contaJoao);

var_dump($contaMaria);







































