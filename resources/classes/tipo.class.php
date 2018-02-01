<?php
/**
 * Classe responsável por guardar objectos do tipo tipo
 */
class Tipo {
  private $id, $nome;
  /**
  * Construtor da classe
  * @param mixed $id ID
  * @param mixed $nome Nome do tipo de alojamento
  */
  public function __construct($id, $nome) {
    $this->id = $id;
    $this->nome = $nome;
  }
  /**
  * Método que permite obter o ID
  * @return mixed ID
  */
  public function getId() {
    return $this->id;
  }

  /**
  * Método que permite obter o nome do tipo de alojamento
  * @return mixed
  */
  public function getNome() {
    return $this->nome;
  }
}
