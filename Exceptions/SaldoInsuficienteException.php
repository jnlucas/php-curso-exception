<?php


namespace Exceptions;

class SaldoInsuficienteException extends \Exception{


    public function __construct($message,$codigo = 0,$exception = null){

        parent::__construct($message, $codigo, $exception);

    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}



?>
