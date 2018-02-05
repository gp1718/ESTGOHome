<?php
//Proteção da página
if(!isset($_SESSION['U_ID'],$_SESSION['U_TIPO']) || $_SESSION['U_TIPO']!=3){
  $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
  header("Location: $url");
  die();
}
?>
<nav class="navbar navbar-dark bg-dark navbar-expand-sm">
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">&#x2630;</button>
  <a class="navbar-brand" href="index.php">
    <span>
      <img src="img/logo.svg" style="vertical-align:-4px" height="30">
      <span style="color: white">ESTGOHome</span>
    </span>
  </a>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li class="nav-item"><a href="?action=anunciosaluno" class="nav-link">Todos os anúncios</a>
      </li>
      <li class="nav-item"><a href="?action=anunciosfavoritos" class="nav-link">Anúncios favoritos</a>
      </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link">Aluno Nº <?php echo $_SESSION['U_ID']; ?></a>
      </li>
      <li class="nav-item"><a href="?action=logout" class="nav-link"><i class="fa fa-sign-out"></i>Terminar sessão</a>
      </li>
    </ul>
  </div>
</nav>
