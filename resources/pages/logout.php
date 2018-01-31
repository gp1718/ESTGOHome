<?php
//Destruir sessão
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();
echo '<script>document.location.href = "?";</script>';
