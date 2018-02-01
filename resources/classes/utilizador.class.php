<?php
/**
* Classe responsável por guardar objectos do tipo utilizador
*/
class Utilizador {
  private $id, $nome, $email, $password, $contacto, $tipo, $estado;

  /**
  * Construtor da classe
  * @param mixed $id ID
  * @param mixed $nome Nome
  * @param mixed $email E-mail
  * @param mixed $password Palavra-passe
  * @param mixed $contacto Contacto
  * @param mixed $tipo Tipo
  * @param mixed $estado estado
  */
  public function __construct($id, $nome, $email, $password, $contacto, $tipo, $estado) {
    $this->id = $id;
    $this->nome = $nome;
    $this->email = $email;
    $this->password = $password;
    $this->contacto = $contacto;
    $this->tipo = $tipo;
    $this->estado = $estado;
  }
  /**
  * Método que retorna o ID
  * @return mixed ID
  */
  public function get_id() {
    return $this->id;
  }
  /**
  * Método que retorna o nome
  * @return mixed Nome
  */
  public function get_nome() {
    return $this->nome;
  }
  /**
  * Método que retorna o e-mail
  * @return mixed E-mail
  */
  public function get_email() {
    return $this->email;
  }
  /**
  * Método que retorna a palavra-passe
  * @return mixed Palavra-passe
  */
  public function get_password() {
    return $this->password;
  }
  /**
  * Método que retorna o contacto
  * @return mixed Contacto
  */
  public function get_contacto() {
    return $this->contacto;
  }
  /**
  * Método que retorna o tipo
  * @return mixed Tipo
  */
  public function get_tipo() {
    return $this->tipo;
  }
  /**
  * Método que retorna o estado
  * @return mixed Estado
  */
  public function get_estado() {
    return $this->estado;
  }
}
