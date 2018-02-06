<?php session_start(); ob_start(); ?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ESTGOHome</title>

  <!--CSS-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"-->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">

  <!--Javascript-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
  <?php

  ?>

  <!--Javascript check-->
  <noscript>
    <div class="alert alert-danger" role="alert" id="js_error">
      <strong>Erro!</strong> A nossa aplicação precisa de Javascript para funcionar. Veja <a href="https://www.enable-javascript.com/pt/" class="alert-link">aqui</a> como ativar esta funcionalidade no seu navegador.
    </div>
  </noscript>

  <?php
  //Header
  if(isset($_SESSION['U_TIPO'])){
    switch($_SESSION['U_TIPO']){
      case "0": require_once('resources/templates/menuadministrador.php'); break;
      case "1": require_once('resources/templates/menugestor.php'); break;
      case "2": require_once('resources/templates/menusenhorio.php'); break;
      case "3": require_once('resources/templates/menualuno.php'); break;
      default: require_once('resources/templates/menuinicial.html'); break;
    }
  }else{
    require_once('resources/templates/menuinicial.html');
  }

  //Lingua
  require_once('resources/configs/lang.php');

  //Main
  if(!empty($_GET['action'])){
    $action = basename($_GET['action']);
    if(!file_exists("resources/pages/$action.php")) $action="../../index";
    require_once("resources/pages/$action.php");
  }elseif(isset($_SESSION['U_TIPO'])){
    switch($_SESSION['U_TIPO']){
      case "0": require_once('resources/pages/listargestores.php'); break;
      case "1": require_once('resources/pages/listaranunciosgestor.php'); break;
      case "2": require_once('resources/pages/listaranunciossenhorio.php'); break;
      case "3": require_once('resources/pages/anunciosaluno.php'); break;
      default: require_once('resources/templates/home.php'); break;
    }
  }else{
    require_once('resources/classes/utilizadordao.class.php');
    $DAO = new GereUtilizador();

    //Verificar se não existe Administrador (primeira execução do sistema)
    if(empty($DAO->obter_detalhes_utilizador_id(1)->get_id())){
      require_once('resources/pages/criaradministrador.php');
    }else{

      //Ver se a aplicação está desativada
      require_once('resources/configs/opcoes.php');
      $bd = new BaseDados();
      $bd->ligar_bd();
      $STH = $bd->dbh->query('SELECT 1 FROM opcao WHERE C_NOME=\''.$opcoes[0][0].'\' AND C_ESTADO=1');
      $bd->desligar_bd();
      if($STH->fetch(PDO::FETCH_ASSOC)){
        $_SESSION['active']=true;
      }

      if(!isset($_SESSION['active']) && !isset($_SESSION['U_TIPO'])){
        require_once('resources/pages/aplicacaodesativada.php');
      }

      //Por defeito
      else{
        require_once('resources/pages/home.php');
      }
    }

  }

  //Footer
  require_once('resources/templates/footer.html');
  ?>
</body>
</html>
