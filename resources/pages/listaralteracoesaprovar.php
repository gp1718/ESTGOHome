<?php
//Proteção da página
if(!isset($_SESSION['active'],$_SESSION['U_TIPO']) || $_SESSION['U_TIPO']!=1){
	$url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
	header("Location: $url");
  die();
}
?>

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item"><a href="index.php">Início</a></li>
    <li class="breadcrumb-item">Anúncios</li>
    <li class="breadcrumb-item active">Listar anúncios com alterações por aprovar</li>
  </ol>
</nav>
<div class="container">
  <h2>Anúncios Alterados para Aprovar</h2>
  <div class="row">
    <!-- inicio do quarto 1-->
    <div class="col-lg-4 col-sm-6 portfolio-item">
      <div class="card h-100">
        <div id="carouselExampleIndicatorsanuncio1" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicatorsanuncio1" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicatorsanuncio1" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicatorsanuncio1" data-slide-to="2"></li>
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
          <a class="carousel-control-prev" href="#carouselExampleIndicatorsanuncio1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicatorsanuncio1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">
            <a href="#">Casa x</a>
          </h4>
          <h5>Descriçao:</h5>
          <h6>Senhorio:</h6>
          <p>Nome: José Pestana<br>Contacto: 919191919</p>
          <h6>Descrição Detalhada</h6>
          <p>Tipo de Alujamento: Apartamento<br>Nº de Quartos: 3<br><p style="color:red;">Sexo: Ambos</p><br><br></p>
          <div style="text-align: right;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalanuncio1">Mais Informações</button>
          </div>
        </div>
      </div>
    </div>
    <!--Fim do quarto 1-->
    <!-- inicio do quarto 2-->
    <div class="col-lg-4 col-sm-6 portfolio-item">
      <div class="card h-100">
        <div id="carouselExampleIndicatorsanuncio2" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicatorsanuncio2" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicatorsanuncio2" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicatorsanuncio2" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicatorsanuncio2" data-slide-to="3"></li>
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
            <div class="carousel-item" style="background-image: url('./img/room3.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color: white">
                  <p>Quarto 3</p>
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
          <a class="carousel-control-prev" href="#carouselExampleIndicatorsanuncio2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicatorsanuncio2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">
            <a href="#">Casa x</a>
          </h4>
          <h5>Descriçao:</h5>
          <h6>Senhorio:</h6>
          <p>Nome: José Nada<br>Contacto: 919191919</p>
          <h6>Descrição Detalhada</h6>
          <p>Tipo de Alujamento: Casa<br><div style="color:red;">Nº de Quartos: 3<br>Sexo: Raparigas</div><br><br></p>
          <div style="text-align: right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalanuncio2">Mais Informações</button></div>
        </div>
      </div>
    </div>
    <!--Fim do quarto 2-->
    <!-- inicio do quarto 3-->
    <div class="col-lg-4 col-sm-6 portfolio-item">
      <div class="card h-100">
        <div id="carouselExampleIndicatorsanuncio3" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicatorsanuncio3" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicatorsanuncio3" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url('./img/room3.jpg')">
              <div class="carousel-caption d-none d-md-block">
                <div style ="color:white">
                  <p>Quarto 1</p>
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
          <a class="carousel-control-prev" href="#carouselExampleIndicatorsanuncio3" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicatorsanuncio3" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title">
            <a href="#">Casa x</a>
          </h4>
          <h5>Descriçao:</h5>
          <h6>Senhorio:</h6>
          <p>Nome: Carolina Patrocinio<br>Contacto: 919191919</p>
          <h6>Descrição Detalhada</h6>
          <p>Tipo de Alujamento: Apartamento<br>Nº de Quartos: 1<br>Sexo: Rapazes<br><br></p>
          <div style="text-align: right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalanuncio3">Mais Informações</button></div>
        </div>
      </div>
    </div>
    <!--Fim do quarto 3-->
  </div>
  <!-- inicio da informaçao do quarto 1 aqui....--->
  <!--Conteudo Modal Anuncio 1-->
  <div class="modal fade bd-example-modal-lg" id="myModalanuncio1" role="dialog" tabindex="-1"  aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Anuncio Titulo.....</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#homeanuncio1" role="tab">Info Geral</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Quartos</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" data-toggle="tab" href="#anuncio1quarto1">Quarto 1</a>
                <a class="dropdown-item" data-toggle="tab" href="#anuncio1quarto2">Quarto 2</a>
              </div>
            </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="homeanuncio1" role="tabpanel">
              <br>
              <h5>Fotografias</h5>
              <div id="carouselExampleIndicatorsanuncio1imgs1" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicatorsanuncio1imgs1" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicatorsanuncio1imgs1" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicatorsanuncio1imgs1" data-slide-to="2"></li>
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
                <a class="carousel-control-prev" href="#carouselExampleIndicatorsanuncio1imgs1" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicatorsanuncio1imgs1" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <br>
              <h5>Nome do Responsável:</h5><p>José Pestana</p>
              <h5>Contacto:</h5><p>919191919</p>
              <h5>Localização:</h5><iframe style="width:100%;height:400px;" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDw_8GQIDFQ_s742JKodecIxUZX_Y3c3pI&q=R.+Gen.+Santos+Costa+11+3400-124+Oliveira+do+Hospital" allowfullscreen></iframe>
              <h5>Tipo de alojamento:</h5><p>Apartamento</p>
              <h5>Nº de quartos:</h5><p>2</p>
              <h5>Caracteristicas:</h5><p>Mobilado,pouca louça....</p>
              <h5>Despesas:</h5><p>Nada Incluido</p>
              <h5>Disponibilidade:</h5><p>Disponiveis os 2 Quartos</p>
              <div style="color:red;"><h5>Sexo:</h5><p>Ambos</p></div>
              <h5>Outras Informações:</h5><p>Informações a indicar.</p>
            </div>
            <div class="tab-pane" id="anuncio1quarto1" role="tabpanel">
              <h5>Quarto 1</h5>
              <img src="./img/room1.jpg" alt="quarto1" height="100%" width="100%">
              <div style="color:red;"> <h5>Renda:</h5><p>180 Euros</p></div>
              <h5>Observações:</h5><p>Quarto pouco mobilado, apanha grande parte do dia sol....</p>
            </div>
            <div class="tab-pane" id="anuncio1quarto2" role="tabpanel">
              <h5>Quarto 2</h5>
              <img src="./img/room2.jpg" alt="quarto2" height="100%" width="100%">
              <h5>Renda:</h5><p>155 Euros</p>
              <div style="color:red;"> <h5>Observações:</h5><p>Quarto apenas com uma cama e secretaria, não apanha grande sol durante o dia ....</p></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" href="#myModalaprovar" >Aprovar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" href="#myModalrejeitar" >Reprovar</button>
        </div>
      </div>
    </div>
  </div>
  <!--Fim do conteudo da modal anuncio 1-->
  <!--Conteudo Modal Anuncio 2-->
  <div class="modal fade bd-example-modal-lg" id="myModalanuncio2" role="dialog" tabindex="-1"  aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Anuncio Titulo.....</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#homeanuncio2" role="tab">Info Geral</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Quartos</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" data-toggle="tab" href="#anuncio2quarto1">Quarto 1</a>
                <a class="dropdown-item" data-toggle="tab" href="#anuncio2quarto2">Quarto 2</a>
                <a class="dropdown-item" data-toggle="tab" href="#anuncio2quarto3">Quarto 3</a>
              </div>
            </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="homeanuncio2" role="tabpanel">
              <br>
              <h5>Fotografias</h5>
              <div id="carouselExampleIndicatorsanuncio2imgs" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicatorsanuncio2imgs" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicatorsanuncio2imgs" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicatorsanuncio2imgs" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicatorsanuncio2imgs" data-slide-to="3"></li>
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
                  <div class="carousel-item" style="background-image: url('./img/room3.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                      <div style ="color: white">
                        <p>Quarto 3</p>
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
                <a class="carousel-control-prev" href="#carouselExampleIndicatorsanuncio2imgs" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicatorsanuncio2imgs" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <br>
              <h5>Nome do Responsável:</h5><p>José Nada</p>
              <h5>Contacto:</h5><p>919191919</p>
              <h5>Localização:</h5><iframe style="width:100%;height:400px;" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDw_8GQIDFQ_s742JKodecIxUZX_Y3c3pI&q=R.+Gen.+Santos+Costa+11+3400-124+Oliveira+do+Hospital" allowfullscreen></iframe>
              <h5>Tipo de alojamento:</h5><p>Casa</p>
              <div style="color:red;"><h5>Nº de quartos:</h5><p>3</p></div>
              <h5>Caracteristicas:</h5><p>Mobilado,pouca louça....</p>
              <h5>Despesas:</h5><p>Tudo Incluido</p>
              <h5>Disponibilidade:</h5><p>Disponiveis os 3 Quartos</p>
              <div style="color:red;"><h5>Sexo:</h5><p>Raparigas</p></div>
              <h5>Outras Informações:</h5><p>Informações a indicar...</p>
            </div>
            <div class="tab-pane" id="anuncio2quarto1" role="tabpanel">
              <h5>Quarto 1</h5>
              <img src="./img/room1.jpg" alt="quarto1" height="100%" width="100%">
              <h5>Renda:</h5><p>200 Euros</p>
              <h5>Observações:</h5><p>Quarto pouco mobilado, apanha grande parte do dia sol....</p>
            </div>
            <div class="tab-pane" id="anuncio2quarto2" role="tabpanel">
              <h5>Quarto 2</h5>
              <img src="./img/room2.jpg" alt="quarto2" height="100%" width="100%">
              <h5>Renda:</h5><p>200 Euros</p>
              <h5>Observações:</h5><p>Quarto apenas com uma cama e secretaria, não apanha grande sol durante o dia ....</p>
            </div>
            <div class="tab-pane" id="anuncio2quarto3" role="tabpanel">
              <h5>Quarto 3</h5>
              <img src="./img/room3.jpg" alt="quarto2" height="100%" width="100%">
              <h5>Renda:</h5><p>300 Euros</p>
              <div style="color:red;"> <h5>Observações:</h5><p>Quarto super modelado, para ricos ....</p></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" href="#myModalaprovar" >Aprovar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" href="#myModalrejeitar" >Reprovar</button>
        </div>
      </div>
    </div>
  </div>
  <!--Fim do conteudo da modal anuncio 2-->
  <!--Conteudo Modal Anuncio 2-->
  <div class="modal fade bd-example-modal-lg" id="myModalanuncio3" role="dialog" tabindex="-1"  aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Anuncio Titulo.....</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#homeanuncio3" role="tab">Info Geral</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Quartos</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" data-toggle="tab" href="#anuncio3quarto1">Quarto 1</a>
              </div>
            </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="homeanuncio3" role="tabpanel">
              <br>
              <h5>Fotografias</h5>
              <div id="carouselExampleIndicatorsanuncio3imgs" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicatorsanuncio3imgs" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicatorsanuncio3imgs" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active" style="background-image: url('./img/room3.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                      <div style ="color:white">
                        <p>Quarto 1</p>
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
                <a class="carousel-control-prev" href="#carouselExampleIndicatorsanuncio3imgs" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicatorsanuncio3imgs" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <br>
              <h5>Nome do Responsável:</h5><p>Carolina Patrocinio</p>
              <h5>Contacto:</h5><p>919191919</p>
              <h5>Localização:</h5><iframe style="width:100%;height:400px;" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDw_8GQIDFQ_s742JKodecIxUZX_Y3c3pI&q=R.+Gen.+Santos+Costa+11+3400-124+Oliveira+do+Hospital" allowfullscreen></iframe>
              <h5>Tipo de alojamento:</h5><p>Apartamento</p>
              <h5>Nº de quartos:</h5><p>1</p>
              <h5>Caracteristicas:</h5><p>Tudo 5 estrelas....</p>
              <h5>Despesas:</h5><p>Tudo Incluido</p>
              <h5>Disponibilidade:</h5><p>Disponivel 1 Quarto</p>
              <h5>Sexo:</h5><p>Rapazes</p>
              <h5>Outras Informações:</h5><p>Informações a indicar...</p>
            </div>
            <div class="tab-pane" id="anuncio3quarto1" role="tabpanel">
              <h5>Quarto 1</h5>
              <img src="./img/room1.jpg" alt="quarto1" height="100%" width="100%">
              <h5>Renda:</h5><p>300 Euros</p>
              <div style="color:red;"><h5>Observações:</h5><p>Quarto de Rei...</p></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" href="#myModalaprovar" >Aprovar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" href="#myModalrejeitar" >Reprovar</button>
        </div>
      </div>
    </div>
  </div>
  <!--fim do conteudo modal anuncio 3-->
</div>
