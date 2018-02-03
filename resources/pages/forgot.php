<?php
//Proteção da página
if(isset($_SESSION['U_ID'],$_SESSION['U_TIPO'])){
	$url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
	header("Location: $url");
  die();
}



//Envio de email
if(isset($_POST['emailrecupera']) ){
	if(!empty($_POST['emailrecupera'])){
		$email = $_POST['emailrecupera'];
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo 'email invalido';
		}else{
			$subject = "Recuperaçao Password";
			$message = "<p>Enviado</p>";
			$from = "response@mywebsite.com";
			$headers = "From: $from" ."\r\n";

			// Send email
			if(mail($email,$subject,$message,$headers)){
				header('location ?action=forgot');
			};
		}

	}else{
		echo 'nao introduziu os campos todos';
	}
}else{
echo 'not ok';
}






?>
<div style="text-align: center;">

  <h2>Recuperar Palavra-Passe</h2><br>


	<form method="post" action="">
		<h6>Introduza em baixo o email associado à sua conta, e clique em "Recuperar". <br>Receberá posteriormente um email onde poderá facilmente criar uma nova palavra passe.</h6>
	  <br><input type="email" id="emailrecupera" name="emailrecupera" placeholder="Insira o seu e-mail" autofocus="" required size="32" minlength="8" maxlength="254">
	  <br><br>
	    <!--<a class="btn btn-success" href='?action=forgot_thanks' role="button" id="recupera" name="recupera"  >Recuperar</a>-->
			<input class="btn btn-success" id="recupera" name="recupera" type="submit" value="Recuperar">
	</form>

  <br>
  <br>
</div>
