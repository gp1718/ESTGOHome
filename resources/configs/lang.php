<?php
//Se existe uma cookie
if(isset($_COOKIE['language'])){
	$lingua = $_COOKIE['language'];
}

//Se não existir cookie
else{
	$lingua = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
}

//Carregar o ficheiro de linguagem
if (file_exists(__DIR__."/lang_".$lingua.".php")){
	require_once (__DIR__."/lang_".$lingua.".php");
}else{
	include_once (__DIR__."/lang_pt.php"); //por defeito
}
