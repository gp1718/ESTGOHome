<?php
if($_SERVER['REQUEST_METHOD']==='POST'){

  if(isset($_POST['lang'])){
    setcookie ('language', $_POST["lang"], time()+60*60*24*30, '/');
  }

  header('Location: ?');
}
