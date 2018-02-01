<<<<<<< HEAD
<div style="text-align: center;">
  <div class="container">
  	<h2>Editar Propria Informação</h2>
  	<br>

    <?php
    require_once('resources/classes/utilizadordao.class.php');
    $DAO=new GereUtilizador();
    $idsession = $_SESSION['U_ID'];

    obter_detalhes_utilizador_id($idsession);


    if($DAO->obter_detalhes_utilizador_email($_POST['email'],$_POST['password'])){
      if(isset($_POST['remember']) && !empty($_POST['remember'])){
        setcookie('PHPSESSID', $_COOKIE['PHPSESSID'], time()+(60*60*24*7), "/");
      }
      echo '<script>document.location.href = "?";</script>';
    }else{
      echo '<script>alert("O e-mail ou a palavra-passe inseridos não se encontram correctos.");</script>';
    }



    ?>

    <div id="divAviso"></div>
  	<form name="formRegisto" onsubmit="return validaRegisto()" method="POST" action="">
  		<div class="form-group">
  			<label for="Nome">Nome</label>
  			<input type="text" class="form-control col-md-8" id="nome" name="nome" placeholder="Nome completo" required>
  		</div>
  		<div class="form-group">
  			<label >Contacto</label>
  			<input type="tel" class="form-control col-md-2" id="contacto" name="contacto" maxlength="9" required>
  		</div>
  		<div class="form-group">
  			<label for="E-mail">E-mail</label>
  			<input type="e-mail" class="form-control col-md-4" id="email" name="email" required>
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
  		<input type="submit" name="btnRegistar" class="btn btn-primary" value="Registar" /><br><br>
  	</form>
  </div>















</div>
=======
<?php
//Proteção da página
if(!isset($_SESSION['U_ID'],$_SESSION['U_TIPO'])){
	$url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
	header("Location: $url");
  die();
}
?>
<p> pagina editar info</p>
>>>>>>> b7af6d90b46d777d0402e2cc1c9ed25c772cc4f2
