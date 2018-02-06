<?php
//Proteção da página
if(!isset($_SESSION['active'],$_SESSION['U_TIPO'])){
  $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
  header("Location: $url");
  die();
}

require_once('resources/classes/utilizadordao.class.php');
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

<!--Breadcrumbs-->
<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item"><a href="index.php">Início</a></li>
    <li class="breadcrumb-item active">Conta</li>
  </ol>
</nav>

<div class="container">
  <h2>Editar Dados pessoais</h2>
  <br>
  <div id="divAviso"></div>
  <form name="formEdita" onsubmit="return validaInfo()" method="POST" action="">
    <input type="hidden" name="emailOld" value="<?php print($emailutl) ?>">
    <div class="form-group">
      <label for="Nome">Nome</label>
      <input type="text" class="form-control col-md-8" id="nome" name="nome" placeholder="Nome completo" value ='<?php print($nomeutl) ?>' required>
    </div>
    <div class="form-group">
      <label>Contacto</label>
      <input type="tel" class="form-control col-md-2" id="contacto" name="contacto" maxlength="9"  value ='<?php print($contactoutl) ?>' required>
    </div>
    <div class="form-group">
      <label for="E-mail">E-mail</label>
      <input type="e-mail" class="form-control col-md-4" id="email" name="email" value ='<?php print($emailutl) ?>' required>
    </div>
    <div class="form-group">
      <label>Palavra-passe antiga</label>
      <input type="password" class="form-control col-md-4" id="passwordOld" name="passwordOld" required>
    </div>
    <div class="form-group">
      <label>Palavra-passe</label>
      <input type="password" class="form-control col-md-4" id="password" name="password">
      <small id="passwordHelp" class="form-text text-muted">A palavra-passe deverá conter uma letra maiúscula, um número e um caractere especial.</small>
    </div>
    <div class="form-group">
      <label>Confirmar palavra-passe</label>
      <input type="password" class="form-control col-md-4" id="cpassword" name="cpassword">
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
  var input = [document.forms["formEdita"]["contacto"].value, document.forms["formEdita"]["email"].value, document.forms["formEdita"]["password"].value, document.forms["formEdita"]["cpassword"].value, document.forms["formEdita"]["passwordOld"].value];

  //Expressões regulares para validar contacto, e-mail e password
  var regexContacto = /[0-9]{9}/;
  var regexEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  var regexPassword = /^(?=.*\d)(?=.*[A-Z])(?=.*[!#$%&()*+,-.:;<=>?@_{|}~])/;

  //Limpar div que mostra os avisos
  div.innerHTML = "";

  if(!input[4]){
    div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Por favor insira a sua password antiga.</div><br>";
    return false;
  }
  if(!regexContacto.test(String(input[0]))){
    div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Por favor insira um contacto válido.</div><br>";
    res = false;
  }
  if(!regexEmail.test(String(input[1]).toLowerCase())){
    div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Por favor insira um <i>e-mail</i> válido.</div><br>";
    res = false;
  }
  if(String(input[2]) != ""){
    if(!regexPassword.test(String(input[2]))){
      div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> A palavra-passe deverá conter uma letra maiúscula, um número e um caractere especial.</div><br>";
      res = false;
    }
  }
  if(input[2] != input[3]){
    div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> As palavras-passe introduzidas não são iguais.</div><br>";
    res = false;
  }
  return res;
}
</script>

<?php
if($_SERVER['REQUEST_METHOD']==='POST'){

  //Ediçao da informaçao
  if(isset($_POST['btnGuardar'])){
    if(isset($_POST['nome'], $_POST['contacto'], $_POST['email'], $_POST['passwordOld']) && !empty($_POST['nome']) && !empty($_POST['contacto']) && !empty($_POST['email']) && !empty($_POST['passwordOld'])){

      require_once('resources/classes/utilizadordao.class.php');
      $DAO = new GereUtilizador();

      //Ver se a password antiga está correta
      if($DAO->password_correta($_POST['emailOld'], $_POST['passwordOld'])){

        //Ver se o e-mail existe
        if($DAO->email_existe($_POST['email']) && $_POST['email'] != $utilizador->get_email()){
          echo '<script>alert("O e-mail introduzido já se encontra registado no sistema.");</script>';
        }else{
          //Também pretende alterar a palavra-passe
          if(isset($_POST['password'], $_POST['cpassword']) && !empty($_POST['password']) && !empty($_POST['cpassword'])){
            if($_POST['password'] != $_POST['cpassword']){
              echo '<script>alert("As passwords introduzidas não são iguais.");</script>';
              return;
            }else
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
          }else
          $password = $utilizador->get_password();

          if($DAO->editar_utilizador(new Utilizador($idutl, $_POST['nome'], $_POST['email'], $password, $_POST['contacto'],$tipoutl, true))){
            echo '<script>alert("A ediçao foi feita com sucesso.");</script>';
            echo '<script>document.location.href = "index.php";</script>';
          }
        }
      }else{
        echo '<script>alert("A password antiga não se encontra correta.");</script>';
      }
    }
  }else
  echo '<script>alert("Por favor preencha todos os campos.");</script>';
}
?>
