<!--LOGIN-->
<br>
<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="text-danger">A aplicação encontra-se temporariamente desativada...</h2>
      <img src="img/erro.svg" style="text-align:center; width:50%">
    </div>
    <div class="col card">
      <h5 class="modal-title">Autenticação de administrador</h5>
      <div id="divAviso1"></div>
      <form method="POST" onsubmit="return validaLogin()" id="loginForm" action="">
        <div class="form-group">
          <label for="email" class="control-label"><i>E-mail</i>:</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Insira o seu e-mail" maxlength="254" required>
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
<br>

<!--Validação php-->
<?php
//TODO: Meter mensagens de erro em bootstrap
if($_SERVER['REQUEST_METHOD']==='POST'){

  //Login
  if(isset($_POST['btnLogin'])){
    if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
      require_once('resources/classes/utilizadordao.class.php');
      $DAO=new GereUtilizador();

      if($DAO->password_correta($_POST['email'],$_POST['password'])){

        //Ver se é admin
        if($_SESSION['U_TIPO']!=0){
          echo '<script>alert("A sua conta não é administrativa.");</script>';
          require_once('resources/pages/logout.php');
        }
        if(isset($_POST['remember']) && !empty($_POST['remember'])){
          setcookie('PHPSESSID', $_COOKIE['PHPSESSID'], time()+(60*60*24*7), "/");
        }
        echo '<script>document.location.href = "";</script>';
      }else{
        echo '<script>alert("O e-mail ou a palavra-passe inseridos não se encontram correctos.");</script>';
      }
    }

  }else{
    echo '<script>alert("Por favor preencha todos os campos.");</script>';
  }
}
?>
