<?php
/**
* Classe responsável por guardar objectos do tipo caracteristica de anúncio
*/
class CaracteristicaAnuncio {
  private $id, $nome;
  /**
  * Construtor da classe
  * @param mixed $id ID
  * @param mixed $nome Nome
  */
  public function __construct($id, $nome) {
    $this->id = $id;
    $this->nome = $nome;
  }
  /**
  * Método que retorna o ID
  * @return mixed ID
  */
  public function getId() {
    return $this->id;
  }
  /**
  * Método que retorna o nome da caracteristica
  * @return mixed Nome
  */
  public function getNome() {
    return $this->nome;
  }

}
