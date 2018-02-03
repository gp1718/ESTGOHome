<?php
//Proteção da página
if(isset($_SESSION['U_ID'],$_SESSION['U_TIPO'])){
  $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
  header("Location: $url");
  die();
}

//Envio de email
require_once('resources/configs/email.php');

if(isset($_POST['emailrecupera'])){
  if(!empty($_POST['emailrecupera'])){
    $email = $_POST['emailrecupera'];

    require_once('resources/classes/utilizadordao.class.php');
    $DAO=new GereUtilizador();

    if($DAO->obter_detalhes_utilizador_email($email)){
      $utilizador = $DAO->obter_detalhes_utilizador_email($email);
      $idutl = $utilizador->get_id();
      $nomeutl = $utilizador->get_nome();
    }

    $corpomensagem ='Olá '.$nomeutl.",<br>"
    .'Aqui se encontra o link para recuperação de password:<br><br>localhost/estgohome/?id='.$idutl.'&action=recuperarPass <br><br>Cumprimentos,<br>ESTGOHome';

    //Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      enviaMail($email,'Recuperação de Password',$corpomensagem);
      header("Location: ?action=forgot_thanks");
    }else{
      echo 'email invalido';
    }
  }else{
    echo 'Não introduziu os campos todos';
  }
}
?>

<div style="text-align: center;">

  <h2>Recuperar Palavra-Passe</h2><br>
  <h6>Introduza em baixo o email associado à sua conta, e clique em "Recuperar". <br>Receberá posteriormente um email onde poderá facilmente criar uma nova palavra passe.</h6>
  <!--<form method="post" action="?action=forgot_thanks">-->
  <div id="divAviso"></div>
  <form name="formEmail" onsubmit="return validaEmail()" method="POST" action="" >
    <input type="email" id="emailrecupera" name="emailrecupera" placeholder="Insira o seu e-mail" autofocus="" required size="32" minlength="8" maxlength="254">
    <br><br>
    <!--<a class="btn btn-success" href='?action=forgot_thanks' role="button" id="recupera" name="recupera"  >Recuperar</a>-->
    <input class="btn btn-success"  id="recupera" name="recupera" type="submit" value="Recuperar">
  </form>

  <br>
  <br>
</div>

<script>
function validaEmail() {
  var res = true;
  var div = document.getElementById('divAviso');
  var input = [document.forms['formEmail']['emailrecupera'].value];

  //Expressões regulares para validar e-mail
  var regexEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

  //Limpar div que mostra os avisos
  div.innerHTML = "";

  if(!regexEmail.test(String(input[0]).toLowerCase())){
    div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Por favor insira um <i>e-mail</i> válido.</div><br>";
    res = false;
  }
  return res;
}
</script>
