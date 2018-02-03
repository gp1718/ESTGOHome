<?php
//Proteção da página
if(!isset($_SESSION['U_ID'],$_SESSION['U_TIPO']) || $_SESSION['U_TIPO']!=0){
  $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
  header("Location: $url");
  die();
}
?>

<!--Breadcrumbs-->
<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item"><a href="#">Início</a></li>
    <li class="breadcrumb-item">Gestores</li>
    <li class="breadcrumb-item active">Listar gestores</li>
  </ol>
</nav>

<!-- titulo -->
<div class="container">
  <h2>Lista de Gestores</h2><br><br>

  <!-- tabela -->
  <div class="row table-responsive">
    <div class="col">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Contacto</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Mark</td>
            <td>Otto@gmail.com</td>
            <td>912546789</td>
            <td>Inativo</td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-success btn-xs" href="#" type="button">Ativar <i class="fa fa-check" aria-hidden="true"></i></button>
                </span>
              </div>
            </td>
          </tr>
          <tr>
            <td>Mark</td>
            <td>Otto@gmail.com</td>
            <td>912546789</td>
            <td>Ativo</td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-danger btn-xs" href="#" type="button">Inativar <i class="fa fa-times" aria-hidden="true"></i></button>
                </span>
              </div>
            </td>
          </tr>
          <tr>
            <td>Mark</td>
            <td>Otto@gmail.com</td>
            <td>912546789</td>
            <td>Ativo</td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-danger btn-xs" href="#" type="button">Inativar <i class="fa fa-times" aria-hidden="true"></i></button>
                </span>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div>
    <button type="submit" class="btn btn-primary">Criar gestor</button>
  </div>
  <br><br><br>
</div>
