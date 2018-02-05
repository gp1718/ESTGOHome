<?php
//Proteção da página
if(!isset($_SESSION['active'],$_SESSION['U_TIPO']) || $_SESSION['U_TIPO']!=3){
  $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
  header("Location: $url");
  die();
}
?>

<nav aria-label="breadcrumb" role="navigation">
	<ol class="breadcrumb bg-white">
		<li class="breadcrumb-item"><a href="index.php">Início</a></li>
		<li class="breadcrumb-item">Anúncios favoritos</li>
	</ol>
</nav>

<!-- PESQUISA -->
<!-- https://bootsnipp.com/snippets/featured/advanced-dropdown-search -->
<div class="container">
	<h2>Favoritos</h2>
	<br>
	<div class="row">
		<!-- inicio do quarto 1-->
		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card h-100">
				<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active" style="background-image: url('./img/room1.jpg')">
							<div class="carousel-caption d-none d-md-block">
								<div style ="color:white">
									<p>Quarto 1</p>
								</div>
							</div>
						</div>
						<div class="carousel-item" style="background-image: url('./img/room2.jpg')">
							<div class="carousel-caption d-none d-md-block">
								<div style ="color: white">
									<p>Quarto 2</p>
								</div>
							</div>
						</div>
						<div class="carousel-item" style="background-image: url('./img/kitchen.jpeg')">
							<div class="carousel-caption d-none d-md-block">
								<div style ="color: white">
									<p>Cozinha</p>
								</div>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">
						<a href="#">150€</a>
						<button type="button" class="favorito_sim">
							<i class="fa fa-star"></i>
						</button>
					</h4>
					<!-- <p class="card-text">Descriçao Casa 1</p> -->
					<h5>913 456 789</h5>
					<h5>Distância à ESTGOH: 1,3 km</h5>
				</div>
			</div>
		</div>
		<!-- fim do quarto 1-->

		<!-- inicio do quarto 2-->
		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card h-100">
				<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active" style="background-image: url('./img/room1.jpg')">
							<div class="carousel-caption d-none d-md-block">
								<div style ="color:white">
									<p>Quarto 2</p>
								</div>
							</div>
						</div>
						<div class="carousel-item" style="background-image: url('./img/room2.jpg')">
							<div class="carousel-caption d-none d-md-block">
								<div style ="color: white">
									<p>Quarto 2</p>
								</div>
							</div>
						</div>

						<div class="carousel-item" style="background-image: url('./img/kitchen.jpeg')">
							<div class="carousel-caption d-none d-md-block">
								<div style ="color: white">
									<p>Cozinha</p>
								</div>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">
						<a href="#">120€</a>
						<button type="button" class="favorito_sim">
							<i class="fa fa-star"></i>
						</button>
					</h4>
					<h5>913 456 789</h5>
					<h5>Distância à ESTGOH: 0,8 km</h5>
				</div>
			</div>
		</div>
		<!-- fim do quarto 2-->


		<!-- inicio do quarto 3-->
		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card h-100">
				<div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active" style="background-image: url('./img/room1.jpg')">
							<div class="carousel-caption d-none d-md-block">
								<div style ="color:white">
									<p>Quarto 3</p>
								</div>
							</div>
						</div>
						<div class="carousel-item" style="background-image: url('./img/room2.jpg')">
							<div class="carousel-caption d-none d-md-block">
								<div style ="color: white">
									<p>Quarto 2</p>
								</div>
							</div>
						</div>

						<div class="carousel-item" style="background-image: url('./img/kitchen.jpeg')">
							<div class="carousel-caption d-none d-md-block">
								<div style ="color: white">
									<p>Cozinha</p>
								</div>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">
						<a href="#">140€</a>
						<button type="button" class="favorito_sim">
							<i class="fa fa-star"></i>
						</button>
					</h4>
					<h5>913 456 789</h5>
					<h5>Distância à ESTGOH: 0,2 km</h5>
				</div>
			</div>
		</div>
		<!-- fim do quarto 3-->

		<!-- inicio do quarto 4-->
		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card h-100">
				<div id="carouselExampleIndicators4" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators4" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators4" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators4" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active" style="background-image: url('./img/room1.jpg')">
							<div class="carousel-caption d-none d-md-block">
								<div style ="color:white">
									<p>Quarto 4</p>
								</div>
							</div>
						</div>
						<div class="carousel-item" style="background-image: url('./img/room2.jpg')">
							<div class="carousel-caption d-none d-md-block">
								<div style ="color: white">
									<p>Quarto 4</p>
								</div>
							</div>
						</div>

						<div class="carousel-item" style="background-image: url('./img/kitchen.jpeg')">
							<div class="carousel-caption d-none d-md-block">
								<div style ="color: white">
									<p>Cozinha</p>
								</div>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators4" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators4" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<div class="card-body">
					<h4 class="card-title">
						<a href="#">150€</a>
						<button type="button" class="favorito_sim">
							<i class="fa fa-star"></i>
						</button>
					</h4>
					<h5>913 456 789</h5>
					<h5>Distância à ESTGOH: 1,1 km</h5>
				</div>

			</div>
		</div>
		<!-- fim do quarto 4-->
	</div>
	<br>
</div>
