<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">

	<!--Javascript-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

	<!--Javascript check-->
	<noscript>
		<div class="alert alert-danger" role="alert" id="js_error">
			<strong>Erro!</strong> A nossa aplicação precisa de Javascript para funcionar. Veja <a href="https://www.enable-javascript.com/pt/" class="alert-link">aqui</a> como ativar esta funcionalidade no seu navegador.
		</div>
	</noscript>

	<?php
	//Header
	include_once('resources/templates/menuinicial.html');

	//Main
	if(!empty($_GET['action'])){
		$action = basename($_GET['action']);
		if(!file_exists("resouces/pages/$action.php")) $action = '../index';
		include_once("resources/pages/$action.php");
	//}elseif(isset($_SESSION['f_id'])){
		//include_once('pages/landing.php');
	}else{
		//Por defeito
		include_once('resources/pages/home.php');
	}

	//Footer
	include_once('resources/templates/footer.html');
	?>

</body>
</html>
