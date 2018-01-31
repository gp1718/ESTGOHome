<?php
//Buscar configurações
require_once('resources/configs/basedados.php');

class BaseDados {
  private $dbh;

  /**
  * Construtor da classe
  */
  function __construct(){}

  /**
  * Método que permite fazer a ligação à base de dados
  **/
  function ligar_bd(){
    global $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS;
    $options = array(
      PDO::ATTR_PERSISTENT => true, //Ver se já existe uma conexão
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Mostrar os erros
    );

    try{
      $this->dbh = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASS, $options);
    }catch(PDOException $e){
      echo '<div class="alert alert-danger text-center"><strong>Erro! </strong>Não foi possivel estabelecer ligação à base de dados.</div>';
      die();
    }
  }

  /*
  * Método que permite desligar a ligação à base de dados
  */
  function desligar_bd(){
    $this->dbh = null;
  }
}
