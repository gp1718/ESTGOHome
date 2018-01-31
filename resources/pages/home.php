<!--JUMBOTRON-->
<div class="jumbotron blurry">
  <div class="container-fluid">
    <div class="row align-items-middle">
      <div class="col">
        <img class="logo shadow" src="img/logo.png" width="200">
      </div>
      <div class="col">
        <h2>Procura alojamento?</h2>
        <p>Entre já na aplicação com as suas credenciais escolares!</p>
        <a class="btn btn-success" href="#" data-toggle="modal" data-target="#loginModal" role="button">Entrar »</a>
      </div>
      <div class="col">
        <h2>Possui um alojamento?</h2>
        <p>Registe-se na plataforma e crie já os seus anúncios.</p>
        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#registerModal" role="button">Registar-me »</a>
      </div>
    </div>
  </div>
</div>

<!--LOGIN-->
<div class="modal fade blurry" id="loginModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Autenticação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="divAviso1"></div><br>
        <form method="POST" onsubmit="return validaLogin()" id="loginForm" action="">
          <div class="form-group">
            <label for="email" class="control-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Insira o seu e-mail" required>
          </div>
          <div class="form-group">
            <label for="password" class="control-label">Palavra-passe:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Insira a sua password" required>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember" id="remember" name="remember"> Lembrar-me
            </label>
          </div>
          <button type="submit" name="btnLogin" class="btn btn-success btn-block">Entrar</button>
          <a href="?action=forgot" class="btn btn-default btn-block">Esqueci-me da password...</a>
        </form>
      </div>
    </div>
  </div>
</div>

<!--REGISTO-->
<div class="modal fade blurry" id="registerModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registo de senhorio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="divAviso2"></div><br>
        <form name="formRegisto" onsubmit="return passwordsIguais()" method="POST" action="">
          <div class="form-group">
            <label for="Nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" required>
          </div>
          <div class="form-group">
            <label >Contacto</label>
            <input type="tel" class="form-control" id="contacto" name="contacto" maxlength="9" required>
          </div>
          <div class="form-group">
            <label for="E-mail">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label >Palavra-passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <small id="passwordHelp" class="form-text text-muted">A password deverá conter uma letra grande, um número e um símbolo</small>
          </div>
          <div class="form-group">
            <label >Confirmar palavra-passe</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword" required>
          </div>
          <button type="submit" name="btnRegistar" class="btn btn-success btn-block">Registar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--COLUNAS-->
<div class="container blurry">
  <div class="row">
    <div class="col">
      <h3>Rápido</h3>
      <img class="logo" src="img/rapido.svg" width="80">
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
      <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div>
    <div class="col">
      <h3>Fácil</h3>
      <img class="logo" src="img/facil.svg" width="80">
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
      <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div>
    <div class="col">
      <h3>Seguro</h3>
      <img class="logo" src="img/seguro.svg" width="80">
      <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus.,</p>
      <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div>
  </div>
</div>

<!--Validação javascript-->
<script>
function passwordsIguais() {
  var div = document.getElementById('divAviso2');
  var password = document.forms["formRegisto"]["password"].value;
  var cPassword = document.forms["formRegisto"]["cpassword"].value;
  if (password != cPassword) {
    //return false;
    div.innerHTML = "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> <a href='#' class='alert-link'>As passwords introduzidas não são iguais! Tente novamente.</div>";
    return false;
  }
  return true;
}
/*
* Função que valida os campos do fomulário de login
*/
function validaLogin(){
  var div = document.getElementById('divAviso1');
  var input = [document.forms["loginForm"]["email"].value, document.forms["loginForm"]["password"].value];
  var regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  if(!input[0] || !input[1]){
    div.innerHTML = "<div class='alert alert-warning' role='alert'><strong>Erro!</strong> Por favor preencha todos os campos.</div>";
    return false;
  }else if(!regex.test(String(input[0]).toLowerCase())){
    div.innerHTML = "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Por favor insira um <i>e-mail</i> válido.</div>";
    return false;
  }
  return true;
}
</script>

<!--Validação php-->
<?php
//TODO: Meter mensagens de erro em bootstrap
if($_SERVER['REQUEST_METHOD']==='POST'){
  echo "<pre>";
  var_dump($_POST);
  echo "</pre>";

  //Login
  if(isset($_POST['btnLogin'])){
    if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
      require_once('resources/classes/utilizadordao.class.php');
      $DAO=new GereUtilizador();
      if($DAO->password_correta($_POST['email'],$_POST['password'])){
        if(isset($_POST['remember']) && !empty($_POST['remember'])){
          setcookie('PHPSESSID', $_COOKIE['PHPSESSID'], time()+(60*60*24*7), "/");
        }
        echo '<script>document.location.href = "?";</script>';
      }else{
        echo '<script>alert("O e-mail ou a palavra-passe inseridos não se encontram correctos.");</script>';
      }
    }else{
      echo '<script>alert("Por favor preencha todos os campos.");</script>';
    }
  }

  //Registo de senhorios
  if(isset($_POST['btnRegistar'])){
    if(isset($_POST['nome'], $_POST['contacto'], $_POST['email'], $_POST['password'], $_POST['cpassword']) && !empty($_POST['nome']) && !empty($_POST['contacto']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['cpassword'])){
      require_once('resources/classes/utilizadordao.class.php');
      $DAO = new GereUtilizador();

      if($DAO->email_existe($_POST['email'])){
        echo '<script>alert("O e-mail introduzido já se encontra registado no sistema.");</script>';
      }else{
        if($DAO->inserir_utilizador(new Utilizador(0, $_POST['nome'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['contacto'], 2, true))){
          echo '<script>alert("O senhorio foi criado com sucesso.");</script>';
        }
      }
    }else
    echo '<script>alert("Por favor preencha todos os campos.");</script>';
  }
}
?>
