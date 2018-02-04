<?php
//Proteção da página
if(!isset($_SESSION['active'],$_SESSION['U_TIPO']) || $_SESSION['U_TIPO']!=1){
	$url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
	header("Location: $url");
  die();
}
?>

<!--Breadcrumbs-->
<nav aria-label="breadcrumb" role="navigation">
	<ol class="breadcrumb bg-white">
		<li class="breadcrumb-item"><a href="#">Início</a></li>
		<li class="breadcrumb-item">Senhorios</li>
		<li class="breadcrumb-item active">Listar todos os senhorios</li>
	</ol>
</nav>

<!-- titulo -->
<div class="container">
<h2>Lista de Senhorios</h2><br><br>

<?php
	require_once('resources/classes/utilizadordao.class.php');
	$DAO=new GereUtilizador();
  $obter_todos_os_senhorios = $DAO->obter_todos_senhorios();
?>


<?php if($obter_todos_os_senhorios == null){ ?>
  <h4>Não existem senhorios</h4><br><br>
<?php }else{ ?>
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
  				<?php
  				  $i = 0;
  					$tamanho = count($obter_todos_os_senhorios);
  					do{
  						?>
  						<tr>
  						  <?php
  							  echo "<td>".$obter_todos_os_senhorios[$i]->get_nome()."</td>";
  								echo "<td>".$obter_todos_os_senhorios[$i]->get_email()."</td>";
  								echo "<td>".$obter_todos_os_senhorios[$i]->get_contacto()."</td>";
  							?>
  							<td>
  								<?php
  								  if($obter_todos_os_senhorios[$i]->get_estado() == 0){?>
  										<form action="" method="post">
  											<input type="hidden" name="id_utilizador" value=<?php echo $obter_todos_os_senhorios[$i]->get_id(); ?> >
  											<button class="btn btn-success btn-xs" name ="bt_alteraestado" type="submit"> Ativar <i class="fa fa-check" aria-hidden="true"></i></button>
  										</form><?php
  									}
  									if($obter_todos_os_senhorios[$i]->get_estado() == 1){?>
  										<form action="" method="post">
  											<input type="hidden" name="id_utilizador" value=<?php echo $obter_todos_os_senhorios[$i]->get_id(); ?> >
  											<button class="btn btn-danger btn-xs" name ="bt_alteraestado" type="submit"> Inativar <i class="fa fa-times" aria-hidden="true"></i></button>
  										</form>
  									<?php } ?>
  							</td>
  						</tr>
  						<?php
  						$i++;
  					}while ($tamanho > $i);
  				?>
  	    </tbody>
      </table>
    </div>
  </div>
  <?php } ?>
	<br><br><br>
</div>

<?php
  if (isset($_POST['bt_alteraestado'])){
    $DAO->alterar_estado_utilizador($_POST['id_utilizador']);
    header("Refresh:0");
  }
?>
