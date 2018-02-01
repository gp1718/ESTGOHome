<?php
/**
* Classe responsável por guardar objectos do tipo fotografia de anúncio
*/
class FotografiaQuarto {
  private $id, $caminho;
  /**
  * Método que retorna o ID
  * @return mixed ID
  */
  public function getId() {
    return $this->id;
  }
  /**
  * Método que retorna o caminho
  * @return mixed Caminho
  */
  public function getCaminho() {
    return $this->caminho;
  }
}
