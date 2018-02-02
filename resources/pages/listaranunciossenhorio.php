<?php
//Proteção da página
if(!isset($_SESSION['U_ID'],$_SESSION['U_TIPO']) || $_SESSION['U_TIPO']!=2){
	$url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
	header("Location: $url");
  die();
}
?>

<!--Breadcrumbs-->
<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb bg-white">
		<li class="breadcrumb-item"><a href="#">Início</a></li>
		<li class="breadcrumb-item">Os meus anúncios</li>
		<li class="breadcrumb-item active">Listar anúncios</li>
  </ol>
</nav>

<div class="container">
  <div class="row">
  <div class="col">
    <h2>Lista de anúncios</h2>
    <!--img class="w-100" src="img/banner.jpg"-->
  </div>
  </div>

  <!--LISTAR E EDITAR-->
  <div class="row table-responsive">
  <div class="col">
    <br><br>
    <table class="table table-hover">
    <thead>
      <tr>
      <th>Responsável</th>
      <th>Localização</th>
      <th>Disponibilidade</th>
      <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td>Nome Sobrenome</td>
      <td>Rua nº1, 1111-1111 Localização
      <td>Disponível</td>
      <td>
        <div class="btn-toolbar">
        <div class="btn-group mr-2">
          <button class="btn btn-primary btn-xs" href="#" type="button">Ver <i class="fa fa-eye" aria-hidden="true"></i></button>
        </div>
        <div class="btn-group mr-2">
          <button class="btn btn-warning btn-xs" href="#" type="button">Editar <i class="fa fa-pencil" aria-hidden="true"></i></button>
        </div>
        <div class="btn-group mr-2">
          <button class="btn btn-danger btn-xs" href="#" type="button">Inativar <i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
        </div>
      </td>
      </tr>
      <tr>
      <td>Nome Sobrenome</td>
      <td>Rua nº2, 1111-1111 Localização
      <td>Não disponível</td>
      <td>
        <div class="btn-toolbar">
        <div class="btn-group mr-2">
          <button class="btn btn-primary btn-xs" href="#" type="button">Ver <i class="fa fa-eye" aria-hidden="true"></i></button>
        </div>
        <div class="btn-group mr-2">
          <button class="btn btn-warning btn-xs" href="#" type="button">Editar <i class="fa fa-pencil" aria-hidden="true"></i></button>
        </div>
        <div class="btn-group mr-2">
          <button class="btn btn-success btn-xs" href="#" type="button">Ativar <i class="fa fa-check" aria-hidden="true"></i></button>
        </div>
        </div>
      </td>
      </tr>
    </tbody>
    <tfoot>
    </tfoot>
    </table>
  </div>
  </div>
  <hr>
</div>
