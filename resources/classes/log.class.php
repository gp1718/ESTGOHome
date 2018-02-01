<?php
/**
* Classe responsável por guardar objectos do tipo log
*/
class Log {
  private $id, $acao, $dataHora;

  /**
  * Construtor da classe
  * @param mixed $id ID
  * @param mixed $acao Ação
  * @param mixed $dataHora Data e hora
  */
  public function __construct($id, $acao, $dataHora) {
    $this->id = $id;
    $this->acao = $acao;
    $this->dataHora = $dataHora;
  }
  /**
  * Método que retorna o ID
  * @return mixed ID
  */
  public function getId() {
    return $this->id;
  }
  /**
  * Método que retorna a ação
  * @return mixed Ação
  */
  public function getAcao() {
    return $this->acao;
  }
  /**
  * Método que retorna a data e hora da ação
  * @return mixed Data e hora
  */
  public function getDataHora() {
    return $this->dataHora;
  }
}
