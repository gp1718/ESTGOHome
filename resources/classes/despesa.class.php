<?php
class Despesa {
  private $id, $despesa;
  /**
   * Construtor da classe
   * @param mixed $id ID
   * @param mixed $despesa Despesa
   */
  public function __construct($id, $despesa) {
    $this->id = $id;
    $this->despesa = $despesa;
  }
  /**
   * Método que retorna o ID
   * @return mixed ID
   */
  public function getId() {
    return $this->id;
  }
  /**
   * Método que retorna a despesa
   * @return mixed Despesa
   */
  public function getDespesa() {
    return $this->despesa;
  }
}
