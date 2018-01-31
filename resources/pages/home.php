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
        <form method="POST" id="loginForm" action="">
          <div class="form-group">
            <label for="email" class="control-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Insira o seu e-mail" autofocus required>
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
          <button type="submit" name="login" class="btn btn-success btn-block">Entrar</button>
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
        <form method="POST" action="">
          <div class="form-group">
            <label for="Nome">Nome</label>
            <input type="text" class="form-control" id="Nome" placeholder="Nome completo" required>
          </div>
          <div class="form-group">
            <label >Contacto</label>
            <input type="tel" class="form-control" id="contacto" maxlength="9" required>
          </div>
          <div class="form-group">
            <label for="E-mail">E-mail</label>
            <input type="email" class="form-control" id="E-mail" required>
          </div>
          <div class="form-group">
            <label >Palavra-passe</label>
            <input type="password" class="form-control" id="password" required>
            <small id="passwordHelp" class="form-text text-muted">A password deverá conter uma letra grande, um número e um símbolo</small>
          </div>
          <div class="form-group">
            <label >Confirmar palavra-passe</label>
            <input type="password" class="form-control" id="Cpassword" required>
          </div>
          <button type="submit" class="btn btn-success btn-block">Registar</button>
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
</script>

<!--Validação php-->
<?php
//TODO: Meter mensagens de erro em bootstrap
if($_SERVER['REQUEST_METHOD']==='POST'){
  echo "<pre>";
  print_r($_POST);

  //Login
  if(isset($_POST['btnLogin'])){
    if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){

      require_once('resources/classes/utilizadordao.class.php');
      $DAO=new GereUtilizador();
      if($DAO->password_correta($_POST['email'],$_POST['password'])){
        echo '<script>document.location.href = "?";</script>';
      }else{
        echo '<script>alert("O e-mail ou a palavra-passe inseridos não se encontram correctos.");</script>';
      }
    }else{
      echo '<script>alert("Por favor preencha todos os campos.");</script>';
    }
  }

  //...

}
?>
