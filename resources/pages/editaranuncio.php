<?php
//Proteção da página
if(!isset($_SESSION['active'],$_SESSION['U_TIPO']) || ($_SESSION['U_TIPO']!=1 && $_SESSION['U_TIPO']!=2 )){
  $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.explode('/',$_SERVER['REQUEST_URI'])[1];
  header("Location: $url");
  die();
}
?>

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item"><a href="index.php">Início</a></li>
    <li class="breadcrumb-item">Os meus anúncios</li>
    <li class="breadcrumb-item"><a href="?action=listaranunciossenhorio">Listar anúncios</a></li>
    <li class="breadcrumb-item active">Editar anúncio</li>
  </ol>
</nav>

<div class="container">
  <h2>Editar anúncio</h2>
  <br>
  <form onsubmit="return verificaMapa()">
    <div class="form-group">
      <label><b>Nome do responsável</b></label>
      <input type="text" class="form-control col-md-5" id="nome_responsavel" placeholder="Nome completo" value="António Silva" required>
    </div>
    <div class="form-group">
      <label><b>Contacto</b></label>
      <input type="text" class="form-control col-md-2" id="contacto" value="913456789" required>
    </div>
    <div class="form-group">
      <label><b>Tipo de alojamento</b></label>
      <select class="form-control" style="width:auto">
        <option value="1">Vivenda</option>
        <option value="2" selected>Apartamento</option>
      </select>
    </div>
    <div class="form-group">
      <div class="row" style="margin: auto">
        <div class="form-check" style="margin-right: 250px">
          <label><b>Características da casa</b></label>
          <br>
          <input type="checkbox" class="form-check-label" name="caracteristicas" value="mobilado" checked> Encontra-se mobilada
          <br>
          <input type="checkbox" class="form-check-label" name="caracteristicas" value="loicas"> Possui loiças de cozinha
          <br>
          <input type="checkbox" class="form-check-label" name="caracteristicas" value="eletrodomesticos" checked> Possui eletrodomésticos
        </div>
        <div class="form-check" style="margin-right: 250px">
          <label><b>Despesas incluídas</b></label>
          <br>
          <input type="checkbox" class="form-check-label" name="despesas_incluidas" value="agua" checked> Água
          <br>
          <input type="checkbox" class="form-check-label" name="despesas_incluidas" value="gas" checked> Gás
          <br>
          <input type="checkbox" class="form-check-label" name="despesas_incluidas" value="luz"> Luz
        </div>
        <div class="form-group" >
          <label><b>Sexo</b></label>
          <br>
          <input type="radio" name="sexo" value="ambos" checked> Ambos
          <br>
          <input type="radio" name="sexo" value="masculino"> Apenas masculino
          <br>
          <input type="radio" name="sexo" value="feminino"> Apenas feminino
          <br>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label><b>Fotografias da casa</b></label>
      <br>
      <div class="row">
        <div class="col">
          <label>Sala: </label>
          <br><img src="img/sala.jpeg" width="340px"><br><br>
          Pretende atualizar esta foto? <input type="file" class="form-control-file">
        </div>
        <div class="col">
          <label>Cozinha: </label>
          <br><img src="img/cozinha.jpeg" width="340px"><br><br>
          Pretende atualizar esta foto? <input type="file" class="form-control-file">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <label>Casa de banho: </label>
          <br><img src="img/casa_de_banho.jpeg" width="340px"><br><br>
          Pretende atualizar esta foto? <input type="file" class="form-control-file">
        </div>
        <div class="col">
          <label>Hall de entrada: </label>
          <br><img src="img/hall_entrada.jpg" width="340px"><br><br>
          Pretende atualizar esta foto? <input type="file" class="form-control-file">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label><b>Localização</b> Clique no mapa se pretende atualizar a localização</label>
      <div id="map" style="width:60%;height:400px;"></div>
      <input type="hidden" name="latitude" id="latitude" value="">
      <input type="hidden" name="longitude" id="longitude" value="">
      <noscript>
        <br>
        <p>O JavaScript encontra-se bloqueado no seu browser. Para escolher a localização da casa no mapa, por favor ative esta funcionalidade.</p>
        <div class="form-group">
          <label>Como alternativa, digite no seguinte campo de texto a morada da casa do anúncio:</label>
          <input type="text" class="form-control  col-md-5" placeholder="Morada" required>
        </div>
      </noscript>
    </div>
    <div class="form-group">
      <h3>Quartos</h3>
      <table class="table table-responsive">
        <thead>
          <tr>
            <th>Renda</th>
            <th>WC Privado</th>
            <th>Possui varanda</th>
            <th>Estado atual</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>140€</td>
            <td>Sim</td>
            <td>Sim</td>
            <td>Ocupado</td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">Desocupar</button>
                </span>
              </div>
            </td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-warning" type="button">Editar</button>
                </span>
              </div>
            </td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-danger" type="button" disabled>Inativar</button>
                </span>
              </div>
            </td>
          </tr>
          <tr>
            <td>110€</td>
            <td>Não</td>
            <td>Sim</td>
            <td style="color:green">Disponível</td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">Ocupar</button>
                </span>
              </div>
            </td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-warning" type="button">Editar</button>
                </span>
              </div>
            </td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-danger" type="button">Inativar</button>
                </span>
              </div>
            </td>
          </tr>
          <tr>
            <td>100€</td>
            <td>Não</td>
            <td>Não</td>
            <td style="color:red">Inativo</td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button" disabled>Ocupar</button>
                </span>
              </div>
            </td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-warning" type="button">Editar</button>
                </span>
              </div>
            </td>
            <td>
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-success" type="button">Ativar</button>
                </span>
              </div>
            </td>
          </tr>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
      <div>
        <h4>Novo quarto/Editar quarto</h4>
        <br>
        <label><b>Renda</b></label>
        <label id="valor_renda"></label><br>
        <input type="range" min="50" max="250" name="renda_quarto" id="range_renda" oninput="valorRenda(this, document.getElementById('valor_renda'))" class="form_control" style="width: 200px"><br><br>
        <input type="checkbox" name="caracteristicas_quarto1" value="wc_privado">
        <label> Possui  WC Privado</label><br>
        <input type="checkbox" name="caracteristicas_quarto1" value="varanda">
        <label> Possui varanda</label>
        <br>
        <div class="form-group">
          <label><b>Fotografias do quarto</b></label>
          <br>
          <label>Fotografia 2: </label>
          <input type="file" class="form-control-file" required>
          <br>
          <label>Fotografia 1: </label>
          <input type="file" class="form-control-file" required>
        </div>
        <input type="submit" id="submeter_novo_quarto" class="btn btn-primary" value="Inserir quarto/Editar quarto" />
      </div>
    </div>
    <div class="form-group">
      <label><b>Outras informações</b></label>
      <textarea class="form-control  col-md-5" rows="3"></textarea>
    </div>
    <input type="submit" id="submeter" class="btn btn-success" value="Editar anúncio" />
  </form>
</div>
<br>
<script type="text/javascript">
var map;
var markers = [];

function initMap() {
  var myLatLng = {
    lat : 40.359658599406856,
    lng : -7.858239412307739
  };
  map = new google.maps.Map(document.getElementById('map'), {
    zoom : 17,
    center : myLatLng,
    mapTypeId : 'hybrid'
  });

  var marker = new google.maps.Marker({
    position : myLatLng,
    map : map,
    title : 'Localização atual'
  });

  var infowindow = new google.maps.InfoWindow({
    content : 'Localização atual'
  });
  infowindow.open(map, marker);

  // This event listener will call addMarker() when the map is clicked.
  map.addListener('click', function(event) {
    addMarker(event.latLng);
  });
}

// Adiciona marcador ao mapa
function addMarker(location) {
  deleteMarkers();
  var marker = new google.maps.Marker({
    position : location,
    map : map
  });

  var infowindow = new google.maps.InfoWindow({
    content : 'Nova localização'
  });

  infowindow.open(map, marker);
  markers.push(marker);
  document.getElementById('latitude').value = location.lat();
  document.getElementById('longitude').value = location.lng();
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Apaga os marcadores do mapa
function clearMarkers() {
  setMapOnAll(null);
}

// Apaga os marcadores do array
function deleteMarkers() {
  clearMarkers();
  markers = [];
}

function verificaMapa() {
  var latitude = document.getElementById("latitude");
  var longitude = document.getElementById("longitude");
  if (latitude && !latitude.value && longitude && !longitude.value) {
    alert("Selecione a localização da casa no mapa!");
    return false;
  }
  return true;
}


function valorRenda(range, label){
  label.innerHTML = range.value+"€";
}

var num_quartos = document.getElementById('num_quartos'), subtrai_quarto = document
.getElementById('subtrai_quarto'), adiciona_quarto = document
.getElementById('adiciona_quarto'), num_quartos_atual, aviso_max = document
.getElementById('aviso_max');

function adicionaQuarto() {
  var num = document.getElementById("quartos").childElementCount+1;
  var div = document.createElement('div');
  div.setAttribute("class", "col");
  div.setAttribute("style", "margin: 3px; border: 1px solid rgba(192,192,192,0.6); border-radius: 5px")
  div.setAttribute("id", "quarto_" + num);

  var lbl_num = document.createElement('h5');
  lbl_num.innerHTML = "<b>Quarto " + num + "</b>";

  var lbl_detalhes = document.createElement('h5');
  lbl_detalhes.innerHTML = "Detalhes";

  var lbl_renda = document.createElement('label');
  lbl_renda.innerHTML = "Renda:";

  var input_renda = document.createElement('input');
  input_renda.setAttribute("type", "range");
  input_renda.setAttribute("name", "renda_quarto" + num);
  input_renda.setAttribute("class", "form-control");
  input_renda.setAttribute("style", "width: 200px");

  var cb_wc = document.createElement('input');
  cb_wc.setAttribute("type", "checkbox");
  cb_wc.setAttribute("name", "caracteristicas_quarto" + num)
  cb_wc.setAttribute("value", "wc_privado");

  var lbl_wc = document.createElement('label');
  lbl_wc.innerHTML = "&nbsp;WC Privado";

  var cb_varanda = document.createElement('input');
  cb_varanda.setAttribute("type", "checkbox");
  cb_varanda.setAttribute("name", "caracteristicas_quarto" + num)
  cb_varanda.setAttribute("value", "varanda");

  var lbl_varanda = document.createElement('label');
  lbl_varanda.innerHTML = "&nbsp;Possui varanda";

  div.appendChild(document.createElement('br'));
  div.appendChild(lbl_num);
  div.appendChild(document.createElement('br'));
  div.appendChild(lbl_detalhes);
  div.appendChild(lbl_renda);
  div.appendChild(input_renda);
  div.appendChild(document.createElement('br'));
  div.appendChild(cb_wc);
  div.appendChild(lbl_wc);
  div.appendChild(document.createElement('br'));
  div.appendChild(cb_varanda);
  div.appendChild(lbl_varanda);
  div.appendChild(document.createElement('br'));
  document.getElementById('quartos').appendChild(div);
  div.appendChild(document.createElement('br'));
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUZ426M3QYwG5S3hC9h92ctT5Nj4w2_z4&callback=initMap"></script>
