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
    <li class="breadcrumb-item"><a href="?action=anunciosaluno">Todos os anúncios</a></li>
    <li class="breadcrumb-item">Anúncio detalhado</li>
  </ol>
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-7 offset-md-1">
      <!--Titulo-->
      <h2>Apartamento T1 em Oliveira do Hospital</h2>

      <!--Card-->
      <div class="card">

        <!--Imagens anúncio-->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="img/a1.jpg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h3>Exterior</h3>
                <p>Lorem ipsilum</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/a2.jpg" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <h3>Interior - Escadaria</h3>
                <p>Lorem ipsilum</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/a3.jpg" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h3>Interior - Escadaria 2</h3>
                <p>Lorem ipsilum</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <!--Descrição-->
        <div class="card-body">
          <h3 class="card-title text-danger">120€</h3>
          <h5>Rua Sr. das Almas 6723-344 Oliveira Hospital</h5>

          <!--Contactos-->
          <img src="img/telefone.png" width="30"> <a href="tel:+351966666666">966 666 666</a><br>
          <img src="img/email.png" width="30"> <a href="mailto:email@exemplo.pt">email@exemplo.pt</a>

          <table class="table">
            <tbody>
              <tr>
                <td style="width: 1rem;"><img src="img/wifi.png"></td>
                <td>
                  Acesso Wi-Fi Gratuito<br>
                  <span class="text-muted">NOS 30Mbps</span>
                </td>
              </tr>
              <tr>
                <td style="width: 1rem;"><img src="img/tv.png"></td>
                <td>
                  Televisão<br>
                  <span class="text-muted">Apenas TDT</span>
                </td>
              </tr>
              <tr>
                <td style="width: 1rem;"><img src="img/cama.png"></td>
                <td>
                  1 Cama<br>
                  <span class="text-muted">Solteiro</span>
                </td>
              </tr>
              <tr>
                <td style="width: 1rem;"><img src="img/gas.png"></td>
                <td>
                  Gás<br>
                  <span class="text-muted">Botija (Butano)</span>
                </td>
              </tr>
              <tr>
                <td style="width: 1rem;"><img src="img/luz.png"></td>
                <td>
                  Eletricidade<br>
                  <span class="text-muted">Incluído na despesa mensal</span>
                </td>
              </tr>
              <tr>
                <td style="width: 1rem;"><img src="img/agua.png"></td>
                <td>
                  Água<br>
                  <span class="text-muted">Incluído na despesa mensal</span>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <!--Mapa-->
                  <noscript>Por favor ative a funcionalidade de Javascript para poder visualizar a localização no mapa.</noscript>
                  <iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDw_8GQIDFQ_s742JKodecIxUZX_Y3c3pI&q=R.+Gen.+Santos+Costa+11+3400-124+Oliveira+do+Hospital" allowfullscreen></iframe>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <hr>
  </div>
</div>
