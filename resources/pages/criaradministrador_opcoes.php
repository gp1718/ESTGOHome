<?php
//Ligação à base de dados
require_once('resources/classes/basedados.class.php');
require_once('resources/configs/opcoes.php');
$bd = new BaseDados();
$bd->ligar_bd();

//Dar reset à tabela só por segurança
$bd->dbh->query('TRUNCATE TABLE opcao');
$bd->dbh->query('ALTER TABLE opcao AUTO_INCREMENT = 0');

//Inserir as opções
$sql = 'INSERT INTO opcao(C_NOME,C_ESTADO) VALUES ';
for($i=0; $i<$tam; $i++){
  $sql .= '(\''.$opcoes[$i][0].'\','.$opcoes[$i][1].'),';
}
$sql = substr($sql, 0, -1);
$bd->dbh->query($sql);

$bd->desligar_bd();
?>
