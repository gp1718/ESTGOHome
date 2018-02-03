<?php
//Proteção da página
if(!isset($_SESSION['U_ID'],$_SESSION['U_TIPO']) || $_SESSION['U_TIPO']!=3){
	$url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
	header("Location: $url");
  die();
}
?>

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item"><a href="#">Início</a></li>
    <li class="breadcrumb-item">Todos os anúncios</li>
  </ol>
</nav>

<!-- PESQUISA -->
<!-- https://bootsnipp.com/snippets/featured/advanced-dropdown-search -->
<div class="container">
  <h2>Anúncios</h2>
  <br>
  <div class="row">
    <div class="col-lg-12" style="padding-bottom: 30px">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Pesquisar anúncios">
        <div class="input-group-btn">
          <div class="btn-group" role="group">
            <div class="dropdown dropdown-lg">
              <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="fa fa-sliders"></span>
              </button>
              <div class="dropdown-menu dropdown-menu-right" role="menu">
                <form class="" role="form">
                  <div class="form-group">
                    <b>Tipo de alojamento</b>
                    <select class="form-control" style="width:auto">
                      <option value="0" selected>Todos</option>
                      <option value="1">Casa</option>
                      <option value="2">Apartamento</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <b>Renda</b>
                    <br>Valor mínimo:
                    <label id="valor_min"></label>
                    <input type="range" min="80" max="250" value="80" id="range_min" style="vertical-align:-5px">
                    <br>Valor máximo:
                    <label id="valor_max"></label>
                    <input type="range" min="80" max="250" value="250" id="range_max" style="vertical-align:-5px">
                  </div>
                  <script>
                  var range_min = document.getElementById('range_min'),
                  valor_min = document.getElementById('valor_min');

                  valor_min.innerHTML = range_min.value+"€";

                  range_min.addEventListener('input', function(){
                    valor_min.innerHTML = range_min.value+"€";
                  }, false);


                  var range_max = document.getElementById('range_max'),
                  valor_max = document.getElementById('valor_max');

                  valor_max.innerHTML = range_max.value+"€";

                  range_max.addEventListener('input', function(){
                    valor_max.innerHTML = range_max.value+"€";
                  }, false);
                  </script>
                  <div class="form-group">
                    <b>Despesas incluídas</b>
                    <br>
                    <span style="margin-right: 10px"><input type="checkbox" name="despesas" value="agua"> Água</span>
                    <span style="margin-right: 10px"> <input type="checkbox" name="despesas" value="gas"> Gás</span>
                    <span style="margin-right: 10px"><input type="checkbox" name="despesas" value="luz"> Luz</span>
                  </div>
                  <div class="form-group">
                    <b>Características</b>
                    <br>
                    <input type="checkbox" name="caracteristicas" value="internet"> Internet
                    <br>
                    <input type="checkbox" name="caracteristicas" value="mobilado"> Mobilado
                    <br>
                    <input type="checkbox" name="caracteristicas" value="eletrodomesticos"> Possui eletrodomésticos
                    <br>
                    <input type="checkbox" name="caracteristicas" value="loicas"> Possui loiças de cozinha
                    <br>
                    <input type="checkbox" name="caracteristicas" value="wc_privado"> WC Privado
                    <br>
                  </div>
                  <div class="form-group">
                    <b>Sexo</b>
                    <br>
                    <input type="radio" name="sexo" value="ambos" checked> Ambos
                    <br>
                    <input type="radio" name="sexo" value="masculino"> Apenas masculino
                    <br>
                    <input type="radio" name="sexo" value="feminino"> Apenas feminino
                    <br>
                  </div>
                  <button type="submit" name="pesquisa_avancada" class="btn btn-primary btn-block">
                    Pesquisa Avançada
                  </button>
                </form>
              </div>
            </div>
            <button type="submit" name="pesquisa" class="btn btn-primary">
              <span class="fa fa-search" aria-hidden="true"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

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
            <div class="carousel-item active" style="background-image: url('img/room1.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color:white">
                  <p>Quarto 1</p>
                </div>
              </div>
            </div>
            <div class="carousel-item" style="background-image: url('img/room2.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color: white">
                  <p>Quarto 2</p>
                </div>
              </div>
            </div>
            <div class="carousel-item" style="background-image: url('img/kitchen.jpeg')">
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
            <div class="carousel-item active" style="background-image: url('img/room1.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color:white">
                  <p>Quarto 2</p>
                </div>
              </div>
            </div>
            <div class="carousel-item" style="background-image: url('img/room2.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color: white">
                  <p>Quarto 2</p>
                </div>
              </div>
            </div>

            <div class="carousel-item" style="background-image: url('img/kitchen.jpeg')">
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
            <button type="button" class="favorito_nao">
              <i class="fa fa-star-o"></i>
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
            <div class="carousel-item active" style="background-image: url('img/room1.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color:white">
                  <p>Quarto 3</p>
                </div>
              </div>
            </div>
            <div class="carousel-item" style="background-image: url('img/room2.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color: white">
                  <p>Quarto 2</p>
                </div>
              </div>
            </div>

            <div class="carousel-item" style="background-image: url('img/kitchen.jpeg')">
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
            <button type="button" class="favorito_nao">
              <i class="fa fa-star-o"></i>
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
            <div class="carousel-item active" style="background-image: url('img/room1.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color:white">
                  <p>Quarto 4</p>
                </div>
              </div>
            </div>
            <div class="carousel-item" style="background-image: url('img/room2.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color: white">
                  <p>Quarto 4</p>
                </div>
              </div>
            </div>

            <div class="carousel-item" style="background-image: url('img/kitchen.jpeg')">
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
            <button type="button" class="favorito_nao">
              <i class="fa fa-star-o"></i>
            </button>
          </h4>
          <h5>913 456 789</h5>
          <h5>Distância à ESTGOH: 1,1 km</h5>
        </div>

      </div>
    </div>
    <!-- fim do quarto 4-->

    <!-- inicio do quarto 5-->
    <div class="col-lg-4 col-sm-6 portfolio-item">
      <div class="card h-100">
        <div id="carouselExampleIndicators5" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators5" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators5" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators5" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url('img/room1.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color:white">
                  <p>Quarto 5</p>
                </div>
              </div>
            </div>
            <div class="carousel-item" style="background-image: url('img/room2.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color: white">
                  <p>Quarto 5</p>
                </div>
              </div>
            </div>

            <div class="carousel-item" style="background-image: url('img/kitchen.jpeg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color: white">
                  <p>Cozinha</p>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators5" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators5" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">
            <a href="#">160€</a>
            <button type="button" class="favorito_sim">
              <i class="fa fa-star"></i>
            </button>
          </h4>
          <h5>913 456 789</h5>
          <h5>Distância à ESTGOH: 1,9 km</h5>
        </div>
      </div>
    </div>
    <!-- fim do quarto 5-->

    <!-- inicio do quarto 6-->
    <div class="col-lg-4 col-sm-6 portfolio-item">
      <div class="card h-100">
        <div id="carouselExampleIndicators6" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators6" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators6" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators6" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url('img/room1.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color:white">
                  <p>Quarto 6</p>
                </div>
              </div>
            </div>
            <div class="carousel-item" style="background-image: url('img/room2.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color: white">
                  <p>Quarto 6</p>
                </div>
              </div>
            </div>

            <div class="carousel-item" style="background-image: url('img/kitchen.jpeg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color: white">
                  <p>Cozinha</p>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators6" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators6" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">
            <a href="#">130€</a>
            <button type="button" class="favorito_nao">
              <i class="fa fa-star-o"></i>
            </button>
          </h4>
          <h5>913 456 789</h5>
          <h5>Distância à ESTGOH: 2,0 km</h5>
        </div>

      </div>
    </div>
    <!-- fim do quarto 6-->
  </div>
  <br>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
