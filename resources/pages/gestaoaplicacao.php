<?php
//TODO: adicionar opcoes quando uma nao aparece na bd


//Proteção da página
if(!isset($_SESSION['U_ID'],$_SESSION['U_TIPO']) || $_SESSION['U_TIPO']!=0){
  $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
  header("Location: $url");
  die();
}
?>
<!--Libraries-->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<style> .toggle {border: 1px solid #aaa}</style>

<?php
//Ligação à base de dados
require_once('resources/classes/basedados.class.php');
$bd = new BaseDados();
$bd->ligar_bd();

//Opções
$opcoes = [
  ['Estado da aplicação',true],
  ['Filtragem para novos alunos (1ª matrícula)',false]
];
$tam = count($opcoes);

//Gerar query
$sql = 'SELECT 1 FROM opcao WHERE C_NOME LIKE ';
for($i=0; $i<$tam; $i++){
  $sql .= '? OR ';
}
$sql = substr($sql, 0, -3);

//Verificar se existem as opções
$STH = $bd->dbh->prepare($sql);
for($i=0; $i<$tam; $i++){
  $STH->bindParam($i+1, $opcoes[$i][0]);
}
$STH->execute();
if(!$STH->fetch(PDO::FETCH_ASSOC)){
  //Reset da tabela
  $bd->dbh->query('TRUNCATE TABLE opcao');
  $bd->dbh->query('ALTER TABLE opcao AUTO_INCREMENT = 0');

  //Gerar query
  $sql = 'INSERT INTO opcao(C_NOME,C_ESTADO) VALUES ';
  for($i=0; $i<$tam; $i++){
    $sql .= '(?,?),';
  }
  $sql = substr($sql, 0, -1);

  //Adicionar opções à base de dados
  $STH = $bd->dbh->prepare($sql);
  for($i=0, $num=1; $i<$tam; $i++){
    for ($j=0; $j<=1; $j++, $num++){
      $STH->bindParam($num, $opcoes[$i][$j]);
    }
  }
  $STH->execute();
}
?>

<div class="container">

  <form name="optionsForm" method="post" action="">
    <div class="card card-body">
      <h2>Gestão da Aplicação</h2>
      <?php
      //Buscar opções
      $STH = $bd->dbh->query('SELECT * FROM opcao');
      $bd->desligar_bd();
      $STH->setFetchMode(PDO::FETCH_ASSOC);
      while($row = $STH->fetch()){
        echo '<p>'.$row['C_NOME'].':<br>';
        echo '<input type="hidden" name="'.$row['C_ID'].'" value="'.$row['C_ESTADO'].'">';
        echo '<input class="toggle" data-toggle="toggle" data-size="mini" data-on="Ligado" data-off="Desligado" type="checkbox" name="'.$row['C_ID'].'"';
        if($row['C_ESTADO']) echo " checked ";
        echo '></p>';
      }
      ?>
      <hr>
      <button type="submit" name="btnSave" class="btn btn-success">Guardar configurações</button>
    </div>
  </form>
</div>

<!--Validação javascript-->
<script>
</script>

<!--Validação php-->
<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
  /*echo "<pre>";
  print_r($_POST);
  echo "</pre>";*/
  if(isset($_POST['btnSave'])){
    $bd->ligar_bd();

    foreach($_POST as $key=>$value){
      if($key!="btnSave"){
        if($value==="on" || $value===1){
          $STH = $bd->dbh->prepare('UPDATE opcao SET C_ESTADO=1 WHERE C_ID=?');
        }else{
          $STH = $bd->dbh->prepare('UPDATE opcao SET C_ESTADO=0 WHERE C_ID=?');
        }
        $STH->bindParam(1, $key);
        $STH->execute();
      }
    }
    $bd->desligar_bd();
    echo "<script>alert('configurações guardadas com sucesso');</script>";
    header("Location: ");
  }
}
?>