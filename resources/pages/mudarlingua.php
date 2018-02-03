<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
  echo "<pre>";
  var_dump($_POST);
  echo "</pre>";

  if(isset($_POST['lang'])){
    setcookie ('language', $_POST["lang"], time()+60*60*24*30, '/');
  }

  header('Location: ?');
}
