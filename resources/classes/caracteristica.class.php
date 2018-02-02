<?php
/**
* Classe responsável por guardar objectos do tipo característica (dos anúncios e dos quartos)
*/
class Caracteristica {
  private $id, $nome, $tipo;
  /**
  * Construtor da classe
  * @param mixed $id ID
  * @param mixed $nome Nome
  * @param mixed $tipo Tipo (TRUE - anúncio; FALSE - quarto)
  */
  public function __construct($id, $nome) {
    $this->id = $id;
    $this->nome = $nome;
    $this->tipo = $tipo;
  }
  /**
  * Método que retorna o ID
  * @return mixed ID
  */
  public function getId() {
    return $this->id;
  }
  /**
  * Método que retorna o nome da característica
  * @return mixed Nome
  */
  public function getNome() {
    return $this->nome;
  }
  /**
  * Método que retorna o tipo de característica
  * @return mixed Tipo
  */
  public function getTipo() {
    return $this->tipo;
  }

}
