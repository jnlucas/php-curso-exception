<?php

class LeitorDeArquivo{

    private $arquivo;

    public function __construct($arquivo){

        $this->arquivo = $arquivo;
        echo "Abrindo Arquivo: ".$arquivo."\n";

    }

    public function letProximaLinha(){
        echo "Lendo Linha \n";

        throw new ErrorException();

        return "linha do arquivo \n";
    }

    public function fechar(){
        echo "Fechando arquivo \n";
    }
}

?>
