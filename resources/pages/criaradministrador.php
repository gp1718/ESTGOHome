<?php
//Proteção da página

require_once('resources/classes/utilizadordao.class.php');
$DAO = new GereUtilizador();

if(isset($_SESSION['U_TIPO']) || !empty($DAO->obter_detalhes_utilizador_id(1)->get_id())){
  $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
  header("Location: $url");
  die();
}
?>

<!--Breadcrumbs-->
<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item">Início</li>
    <li class="breadcrumb-item active">Registo do Administrador</li>
  </ol>
</nav>

<!--REGISTO-->
<div class="container">
  <h2>Registar Administrador</h2>
  <br>
  <div id="divAviso"></div>
  <form name="formRegisto" onsubmit="return validaRegisto()" method="POST" action="">
    <div class="form-group">
      <label for="Nome">Nome</label>
      <input type="text" class="form-control col-md-8" id="nome" name="nome" placeholder="Nome completo" required>
    </div>
    <div class="form-group">
      <label>Contacto</label>
      <input type="tel" class="form-control col-md-2" id="contacto" name="contacto" maxlength="9" required>
    </div>
    <div class="form-group">
      <label for="E-mail">E-mail</label>
      <input type="e-mail" class="form-control col-md-4" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label>Palavra-passe</label>
      <input type="password" class="form-control col-md-4" id="password" name="password" required>
      <small id="passwordHelp" class="form-text text-muted">A palavra-passe deverá conter uma letra maiúscula, um número e um caractere especial.</small>
    </div>
    <div class="form-group">
      <label>Confirmar palavra-passe</label>
      <input type="password" class="form-control col-md-4" id="cpassword" name="cpassword" required>
    </div>
    <input type="submit" name="btnRegistar" class="btn btn-primary" value="Registar"><br><br>
  </form>
</div>

<!--Validação javascript-->
<script>
/*
* Função que valida os campos do fomulário de registo de senhorios
*/
function validaRegisto() {
  var res = true;
  var div = document.getElementById('divAviso');
  var input = [document.forms["formRegisto"]["contacto"].value, document.forms["formRegisto"]["email"].value, document.forms["formRegisto"]["password"].value, document.forms["formRegisto"]["cpassword"].value];

  var emailSplit = String(input[1]).split('@');

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
  if(emailSplit[1].toLowerCase() == 'estgoh.ipc.pt'){
    div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Por favor utilize um <i>e-mail</i> fora do domínio <b>estgoh.ipc.pt</b>.</div><br>";
    res = false;
  }
  if(!regexPassword.test(String(input[2]))){
    div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> A palavra-passe deverá conter uma letra maiúscula, um número e um caractere especial.</div><br>";
    res = false;
  }
  if (input[2] != input[3]) {
    div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> As palavras-passe introduzidas não são iguais.</div><br>";
    res = false;
  }
  return res;
}
</script>

<!--Validação php-->
<?php
if($_SERVER['REQUEST_METHOD']==='POST'){

  //Registo do administrador
  if(isset($_POST['btnRegistar'])){
    if(isset($_POST['nome'], $_POST['contacto'], $_POST['email'], $_POST['password'], $_POST['cpassword']) && !empty($_POST['nome']) && !empty($_POST['contacto']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['cpassword'])){
      require_once('resources/classes/utilizadordao.class.php');
      $DAO = new GereUtilizador();

      $email_array = explode("@", $_POST['email']);

      if($email_array[1] == "estgoh.ipc.pt"){
        echo '<script>alert("Por favor utilize um e-mail fora do domínio estgoh.ipc.pt.");</script>';
      }elseif($_POST['password'] != $_POST['cpassword']){
        echo '<script>alert("As palavras-passe introduzidas não são iguais.");</script>';
      }else{
        if($DAO->inserir_utilizador(new Utilizador(0, $_POST['nome'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['contacto'], 0, true))){
          echo '<script>alert("O Administrador foi criado com sucesso.");</script>';

          //Criar opções da aplicação
          require_once('resources/pages/criaradministrador_opcoes.php');
          header('Location: index.php');
        }
      }
    }else
      echo '<script>alert("Por favor preencha todos os campos.");</script>';
  }
}
 ?>
