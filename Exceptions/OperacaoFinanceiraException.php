<?php


namespace Exceptions;

class OperacaoFinanceiraException extends \Exception{


  public function __construct($mensagem,$codigo = 0,$exception = null)
  {

      parent::__construct($mensagem, $codigo, $exception);

  }

  public function __toString()
  {
      return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
  }

}



?>
