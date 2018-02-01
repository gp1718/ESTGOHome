<?php
//Obter classes necessárias
require_once(__DIR__.'/basedados.class.php');
require_once(__DIR__.'/quarto.class.php');
require_once(__DIR__.'/fotografiaquarto.class.php');

/**
 * Classe responsável por manipular objectos do tipo quarto
 */
class GereQuarto {
  public function inserir_quarto(Quarto $quarto) {
    return false;
  }
  public function editar_quarto(Quarto $quarto) {
    return false;
  }
  public function obter_detalhes_quarto($id) {
    return null;
  }
  public function obter_todos_quartos() {
    return null;
  }
  public function obter_quartos_anuncio() {
    return null;
  }
  public function alterar_estado_quarto($id, $estado) {
    return false;
  }
  public function adicionar_foto_quarto(FotografiaQuarto $fotografia) {
    return false;
  }
  public function alterar_foto_quarto(FotografiaQuarto $fotografia) {
    return false;
  }
  public function obter_fotos_quarto($id) {
    return null;
  }
  public function adicionar_caracteristica_quarto($id_quarto, $id_caracteristica) {
    return false;
  }
  public function remover_caracteristica_quarto($id_quarto, $id_caracteristica) {
    return false;
  }
  public function obter_caracteristicas_quarto($id) {
    return null;
  }
}
