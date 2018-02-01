<?php
//Proteção da página
if(!isset($_SESSION['U_ID'],$_SESSION['U_TIPO'])){
	$url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
	header("Location: $url");
  die();
}

require_once('resources/classes/utilizadordao.class.php');
//require_once('resources/classes/utilizador.class.php');
$DAO=new GereUtilizador();

if($DAO->obter_detalhes_utilizador_id($_SESSION['U_ID'])){
    $utilizador = $DAO->obter_detalhes_utilizador_id($_SESSION['U_ID']);
    $idutl = $_SESSION['U_ID'];
    $nomeutl = $utilizador->get_nome();
    $contactoutl = $utilizador->get_contacto();
    $emailutl = $utilizador->get_email();
    $tipoutl =$_SESSION['U_TIPO'];
}

?>


  <div class="container">
  	<h2>Editar Propria Informação</h2>
  	<br>


    <div id="divAviso"></div>
  	<form name="formEdita" onsubmit="return validaInfo()" method="POST" action="">
  		<div class="form-group">
  			<label for="Nome">Nome</label>
  			<input type="text" class="form-control col-md-8" id="nome" name="nome" placeholder="Nome completo" value ='<?php print($nomeutl) ?>' required>
  		</div>
  		<div class="form-group">
  			<label >Contacto</label>
  			<input type="tel" class="form-control col-md-2" id="contacto" name="contacto" maxlength="9"  value ='<?php print($contactoutl) ?>' required>
  		</div>
  		<div class="form-group">
  			<label for="E-mail">E-mail</label>
  			<input type="e-mail" class="form-control col-md-4" id="email" name="email" value ='<?php print($emailutl) ?>' required>
  		</div>
  		<div class="form-group">
  			<label >Palavra-passe</label>
  			<input type="password" class="form-control col-md-4" id="password" name="password" required>
  			<small id="passwordHelp" class="form-text text-muted">A password deverá conter uma letra grande, um número e um símbolo</small>
  		</div>
  		<div class="form-group">
  			<label >Confirmar palavra-passe</label>
  			<input type="password" class="form-control col-md-4" id="cpassword" name="cpassword" required>
  		</div>
  		<input type="submit" name="btnGuardar" class="btn btn-primary" value="Guardar" /><br><br>
  	</form>
  </div>


  <!--Validação javascript-->
  <script>
  /*
  * Função que valida os campos do fomulário da ediçao de informaçao
  */
  function validaInfo() {
    var res = true;
    var div = document.getElementById('divAviso');
    var input = [document.forms["formEdita"]["contacto"].value, document.forms["formEdita"]["email"].value, document.forms["formEdita"]["password"].value, document.forms["formEdita"]["cpassword"].value];

    //Expressões regulares para validar contacto, e-mail e password
    var regexContacto = /[0-9]{9}/;
    var regexEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var regexPassword = /^(?=.*\d)(?=.*[A-Z])(?=.*[!#$%&()*+,-.:;<=>?@_{|}~])/;

    //Limpar div que mostra os avisos
    div.innerHTML = "";

    if(!regexContacto.test(String(input[0]))){
      div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Por favor insira um contacto válido.</div><br>";
      res = false;
    }
    if(!regexEmail.test(String(input[1]).toLowerCase())){
      div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Por favor insira um <i>e-mail</i> válido.</div><br>";
      res = false;
    }
    if(!regexPassword.test(String(input[2]))){
      div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> A palavra-passe deverá conter uma letra maiúscula, um número e um caractere especial.</div><br>";
      res = false;
    }else if (input[2] != input[3]) {
      div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> As palavras-passe introduzidas não são iguais.</div><br>";
      res = false;
    }
    return res;
  }
  </script>



<?php

if($_SERVER['REQUEST_METHOD']==='POST'){
  /*echo "<pre>";
  var_dump($_POST);
  echo "</pre>";*/

  //Ediçao da informaçao
  if(isset($_POST['btnGuardar'])){
    if(isset($_POST['nome'], $_POST['contacto'], $_POST['email'], $_POST['password'], $_POST['cpassword']) && !empty($_POST['nome']) && !empty($_POST['contacto']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['cpassword'])){
      require_once('resources/classes/utilizadordao.class.php');
      $DAO = new GereUtilizador();

      if($_POST['password'] != $_POST['cpassword']){
        echo '<script>alert("As passwords introduzidas não são iguais.");</script>';
      }else{
        if($DAO->editar_utilizador(new Utilizador($idutl, $_POST['nome'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['contacto'],$tipoutl, true))){
          echo '<script>alert("A ediçao foi feita com sucesso.");</script>';
          header("Refresh:0");
        }
      }
    }else
      echo '<script>alert("Por favor preencha todos os campos.");</script>';
  }
}
?>
