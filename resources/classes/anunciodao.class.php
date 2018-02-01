<?php
//Obter classes necessárias
require_once(__DIR__.'/basedados.class.php');
require_once(__DIR__.'/anuncio.class.php');

/**
 * Classe responsável por manipular objectos do tipo anúncio
 */
class GereAnuncio {
  public function inserir_anuncio(Anuncio $anuncio) {
    return false;
  }
  public function editar_anuncio(Anuncio $anuncio) {
    return false;
  }
  public function obter_detalhes_anuncio($id) {
    return null;
  }
  public function obter_todos_anuncios() {
    return null;
  }
  public function alterar_estado_anuncio($id, $estado) {
    
  }
}
