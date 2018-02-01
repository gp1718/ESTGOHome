<?php
//Obter classes necessárias
require_once(__DIR__.'/basedados.class.php');
require_once(__DIR__.'/anuncio.class.php');
require_once(__DIR__.'/fotografiaanuncio.class.php');

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
    return false;
  }
  public function adicionar_foto_anuncio(FotografiaAnuncio $fotografia) {
    return false;
  }
  public function alterar_foto_anuncio(FotografiaAnuncio $fotografia) {
    return false;
  }
  public function obter_fotos_anuncio($id) {
    return null;
  }
  public function adicionar_caracteristica_anuncio($id_anuncio, $id_caracteristica) {
    return false;
  }
  public function remover_caracteristica_anuncio($id_anuncio, $id_caracteristica) {
    return false;
  }
  public function obter_caracteristicas_anuncio($id) {
    return null;
  }
  public function adicionar_despesa_anuncio($id) {
    return false;
  }
  public function remover_despesa_anuncio($id) {
    return false;
  }
  public function obter_despesas_anuncio($id) {
    return null;
  }
}
