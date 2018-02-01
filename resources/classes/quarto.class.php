<?php
/**
 * Classe responsável por guardar objectos do tipo quarto
 */
class Quarto {
  private $id, $renda, $estado;
  /**
  * Construtor da classe
  * @param mixed $id ID
  * @param mixed $renda Renda
  * @param mixed $estado Estadp
  */
  public function __construct($id, $renda, $estado) {
    $this->id = $id;
    $this->renda = $renda;
    $this->estado = $estado;
  }

  /**
  * Método que retorna o ID
  * @return mixed ID
  */
  public function getId() {
    return $this->id;
  }

  /**
  * Método que retorna a renda
  * @return mixed Renda
  */
  public function getRenda() {
    return $this->renda;
  }

  /**
  * Método que retorna o estado
  * @return mixed Estado
  */
  public function getEstado() {
    return $this->estado;
  }

}
