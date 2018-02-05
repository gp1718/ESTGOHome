<?php
//Proteção da página
if(isset($_SESSION['U_TIPO'])){
  $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
  header("Location: $url");
  die();
}
?>

<div style="text-align: center;">

  <h2>Recuperar Palavra-Passe</h2><br>
  <!--<h6>Introduza em baixo o email associado à sua conta, e clique em "Recuperar". <br>Receberá posteriormente um email onde poderá facilmente criar uma nova palavra passe.</h6>-->
  <h6>Introduza o e-mail associado à sua conta e clique em "Recuperar".<br>Receberá posteriormente um e-mail com uma nova palavra-passe gerada pelo nosso sistema.</h6>
  <div id="divAviso"></div>
  <form name="formEmail" onsubmit="return validaEmail()" method="POST" action="" >
    <input type="email" class="form-control col-lg-3" style="margin: auto" id="email" name="email" placeholder="Insira o seu e-mail" maxlength="254" required>
    <br>
    <input class="btn btn-success" id="btnRecupera" name="btnRecupera" type="submit" value="Recuperar">
  </form>
</div>

<script>
function validaEmail() {
  var div = document.getElementById('divAviso');
  var input = [document.forms['formEmail']['emailrecupera'].value];

  //Expressão regular para validar e-mail
  var regexEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

  //Limpar div que mostra os avisos
  div.innerHTML = "";

  if(!regexEmail.test(String(input[0]).toLowerCase())){
    div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Por favor insira um <i>e-mail</i> válido.</div><br>";
    return false;
  }
  return true;
}
</script>

<?php
/**
* Função que gera uma palavra-passe aleatória
* @return String palavra-passe gerada aleatoriamente
*/
function gera_password() {
  $maiusculas = range('A', 'Z');
  $minusculas = range('a', 'z');
  $numeros = range(1, 9);
  $especiais = str_split("!#$%&()*+,-.:;<=>?@_{|}~");

  $caracteres = array_merge($maiusculas, $minusculas, $numeros, $especiais);

  $password = "";
  $caracteres_len = count($caracteres);

  for($i = 0; $i < 8; $i++){
    $password .= $caracteres[mt_rand(0, $caracteres_len-1)];
  }

  return $password;
}

//Envio de email
require_once('resources/configs/email.php');

if(isset($_POST['btnRecupera'])){
  if(isset($_POST['email']) && !empty($_POST['email'])){
    require_once('resources/classes/utilizadordao.class.php');
    $DAO = new GereUtilizador();

		if(!$DAO->email_existe($_POST['email'])){
			  echo '<script>alert("O e-mail introduzido não se encontra registado no sistema.");</script>';
		}else{
      $utilizador = $DAO->obter_detalhes_utilizador_email($email);
      $nova_password = gera_password();

	    //$corpomensagem ='Olá '.$nomeutl.",<br>"
	    //.'Aqui se encontra o link para recuperação de password:<br><br><a href="http://localhost/estgohome/?id='.$idutl.'&action=recuperarPass">Recuperar palavra-passe</a> <br><br>Cumprimentos,<br>ESTGOHome';

      $corpomensagem = "Olá <b>".$utilizador->get_nome()."</b>,<br><br>";
      $corpomensagem .= "Como medida de recuperação da palavra-passe da sua conta ESTGOHome, foi gerada uma nova palavra-passe pelo sistema: <b>$nova_password</b>.<br>";
      $corpomensagem .= "Após a autenticação com as novas credenciais, poderá alterar a sua palavra-passe na página Editar Dados pessoais.<br><br><br>";
      $corpomensagem .= "<center>Escola Superior de Tecnologia e Gestão de Oliveira do Hospital<br></center>";
      $corpomensagem .= "<center>Rua General Santos Costa | 3400-124 Oliveira do Hospital | Portugal<br></center>";
      $corpomensagem .= "<center>Tel: 238 605 170 | Fax: 238 605 179<br></center>";
      $corpomensagem .= "<center>E-mail: geral@estgoh.ipc.pt<br></center>";

	    //Remove all illegal characters from email
	    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

	    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
	      if(enviaMail($email, 'Recuperação de Password', $corpomensagem)){
          $DAO->editar_utilizador(new Utilizador($utilizador->get_id(), $utilizador->get_nome(), $utilizador->get_email(), password_hash($password), $utilizador->get_contacto(), $utilizador->get_tipo(), $utilizador->get_estado()));
          echo '<script>alert("Foi enviado um e-mail com um nova palavra-passe. Por favor verifique o seu e-mail.");</script>';
        }
	    }else{
        /*TODO: que mensagem apresento aqui?*/
	      echo "Erro";
	    }
		}
  }else{
    echo '<script>alert("Por favor preencha o campo do e-mail.");</script>';
  }
}
 ?>
