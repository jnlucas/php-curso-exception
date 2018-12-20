<?php

ini_set('display_errors',1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');


require_once "Entity/ContaCorrente.php";


$contaCorrenteJoao = new ContaCorrente("João Lucas","5199","16321-2", 500.50);

$contaCorrenteJose = new ContaCorrente("Jose da silva","5199","122221-2", 900.50);


echo "Inicio da conta dos correntistas joao e jose<br />";
echo $contaCorrenteJoao;

echo $contaCorrenteJose;

echo "<br />";


$contaCorrenteJoao->sacar(20.00);
echo $contaCorrenteJoao; 

$contaCorrenteJoao->depositar(20.00);
echo $contaCorrenteJoao; 



$contaCorrenteJoao->transferir(10.00, $contaCorrenteJose);
echo $contaCorrenteJoao; 

echo $contaCorrenteJose; 
