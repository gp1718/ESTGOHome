<?php
/**
 * Classe responsável por guardar objectos do tipo anúncio
 */
class Anuncio {

  private $id, $nome_responsavel, $contacto, $localizacao, $estado, $genero, $outras_informacoes;

  /**
   * Construtor da classe anúncio
   * @param mixed $id ID
   * @param mixed $nome_responsavel Nome do responsável
   * @param mixed $contacto Contacto do responsável
   * @param mixed $localizacao Localização
   * @param mixed $estado Estado
   * @param mixed $genero Género
   * @param mixed $outras_informacoes Outras informações
   */
  public function __construct($id, $nome_responsavel, $contacto, $localizacao, $estado, $genero, $outras_informacoes) {
		$this->id = $id;
		$this->nome_responsavel = $nome_responsavel;
		$this->contacto = $contacto;
		$this->localizacao = $localizacao;
    $this->estado = $estado;
		$this->genero = $genero;
		$this->outras_informacoes = $outras_informacoes;
	}
  /**
   * Método que retorna o ID
   * @return mixed ID
   */
  public function getId() {
    return $this->id;
  }
  /**
   * Método que retorna o nome do responsável
   * @return mixed Nome do responsável
   */
  public function getNome_responsavel() {
    return $this->nome_responsavel;
  }
  /**
   * Método que retorna o contacto do responável
   * @return mixed Contacto do responsável
   */
  public function getContacto() {
    return $this->contacto;
  }
  /**
   * Método que retorna um array com a localização
   * @return mixed Localização
   */
  public function getLocalizacao() {
    return $this->localizacao;
  }
  /**
   * Método que retorna o estado
   * @return mixed Estado
   */
  public function getEstado() {
    return $this->estado;
  }
  /**
   * Método que retorna o género
   * @return mixed Género
   */
  public function getGenero() {
    return $this->genero;
  }
  /**
   * Método que retorna outras informações
   * @return mixed Outras informações
   */
  public function getOutras_informacoes() {
    return $this->outras_informacoes;
  }
}
