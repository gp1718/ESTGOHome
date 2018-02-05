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
    <li class="breadcrumb-item active">Novo anúncio</li>
  </ol>
</nav>

<div class="container">
  <h2>Novo anúncio</h2>
  <br>
<form onsubmit="return verificaMapa()">
  <div class="form-group">
    <label><b>Nome do responsável</b></label>
    <input type="text" class="form-control col-md-5" id="nome_responsavel" placeholder="Nome completo" required>
  </div>
  <div class="form-group">
    <label><b>Contacto</b></label>
    <input type="text" class="form-control col-md-2" id="contacto" required>
  </div>
  <div class="form-group">
    <label><b>Tipo de alojamento</b></label>
    <select class="form-control" style="width:auto">
      <option value="1">Vivenda</option>
      <option value="2">Apartamento</option>
    </select>
  </div>
  <div class="form-group">
    <div class="row" style="margin: auto">
      <div class="form-check" style="margin-right: 250px">
        <label><b>Características da casa</b></label>
        <br>
        <input type="checkbox" class="form-check-label" name="caracteristicas" value="mobilado"> Encontra-se mobilada
        <br>
        <input type="checkbox" class="form-check-label" name="caracteristicas" value="loicas"> Possui loiças de cozinha
        <br>
        <input type="checkbox" class="form-check-label" name="caracteristicas" value="eletrodomesticos"> Possui eletrodomésticos
      </div>
      <div class="form-check" style="margin-right: 250px">
        <label><b>Despesas incluídas</b></label>
        <br>
        <input type="checkbox" class="form-check-label" name="despesas_incluidas" value="agua"> Água
        <br>
        <input type="checkbox" class="form-check-label" name="despesas_incluidas" value="gas"> Gás
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
    <label><b>Fotografias da casa</b> (Poderá inserir fotografias dos quartos mais abaixo)</label>
    <br>
    <label>Sala: </label>
    <input type="file" class="form-control-file" required>
    <br>
    <label>Cozinha: </label>
    <input type="file" class="form-control-file" required>
    <br>
    <label>Casa de banho: </label>
    <input type="file" class="form-control-file" required>
    <br>
    <label>Hall de entrada: </label>
    <input type="file" class="form-control-file" required>
  </div>
  <label><b>Estado</b></label>
  <select class="form-control" style="width:auto">
    <option value="1">Disponível</option>
    <option value="2">Ocupado</option>
    <option value="3">Inativo</option>
  </select><br>
  <div class="form-group">
    <label><b>Localização</b></label>
    <div id="map" style="width:60%;height:400px;" hidden="hidden"></div>
    <input type="hidden" name="latitude" id="latitude" value="">
    <input type="hidden" name="longitude" id="longitude" value="">
    <noscript>
      <br>
      <p>O JavaScript encontra-se bloqueado no seu browser.
        Para escolher a localização da casa no mapa, por favor ative esta funcionalidade.</p>
        <div class="form-group">
          <label>Como alternativa, digite no seguinte campo de texto a morada da casa do anúncio:</label>
          <input type="text" class="form-control  col-md-5" placeholder="Morada" required>
        </div>
      </noscript>
      <script>
      document.getElementById("map").removeAttribute('hidden');
      var map;
      var markers = [];

      function initMap() {
        var center = {
          lat : 40.3609373,
          lng : -7.8606001
        };

        map = new google.maps.Map(document
          .getElementById('map'), {
            zoom : 17,
            center : center,
            mapTypeId : 'hybrid'
          });

          // Este listener vai chamar o método addMarker() quando se clica no mapa.
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
            content : 'Latitude: ' + location.lat()
            + '<br>Longitude: ' + location.lng()
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


        function verificaMapa(){
          var latitude = document.getElementById("latitude");
          var longitude = document.getElementById("longitude");
          if (latitude && !latitude.value && longitude && !longitude.value) {
            alert("Selecione a localização da casa no mapa!");
            return false;
          }
          return true;
        }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUZ426M3QYwG5S3hC9h92ctT5Nj4w2_z4&callback=initMap">
        </script>
      </div>
      <div class="form-group">
        <label><b>Número de quartos</b></label><br>
        <button type="button" class="btn btn-light" id="subtrai_quarto"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
        <label id="num_quartos">1</label>
        <button type="button" class="btn btn-light" id="adiciona_quarto"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
        <label id="aviso_max" style="color:red"></label>
        <br><br>
        <div id="quartos" class="row">

        </div>
        <script>
        var num_quartos = document.getElementById('num_quartos'),
        subtrai_quarto = document.getElementById('subtrai_quarto'),
        adiciona_quarto = document.getElementById('adiciona_quarto'),
        num_quartos_atual,
        aviso_max = document.getElementById('aviso_max');

        function adicionaQuarto(num){
          var div = document.createElement('div');
          div.setAttribute("class", "col");
          div.setAttribute("style", "margin: 3px; border: 1px solid rgba(192,192,192,0.6); border-radius: 5px")
          div.setAttribute("id", "quarto_"+num);

          var lbl_num = document.createElement('label');
          lbl_num.innerHTML = "<h5><b>Quarto "+num+"</b></h5>";

          var lbl_detalhes = document.createElement('label');
          lbl_detalhes.innerHTML = "<h5>Detalhes</h5>";

          var lbl_renda = document.createElement('label');
          lbl_renda.innerHTML = "Renda:";

          var lbl_valor_renda = document.createElement('label');
          lbl_valor_renda.innerHTML = "100€";

          var input_renda = document.createElement('input');
          input_renda.setAttribute("type", "range");
          input_renda.setAttribute("name", "renda_quarto"+num);
          input_renda.setAttribute("class", "form-control");
          input_renda.setAttribute("style", "width: 200px");

          var cb_wc = document.createElement('input');
          cb_wc.setAttribute("type", "checkbox");
          cb_wc.setAttribute("name", "caracteristicas_quarto"+num)
          cb_wc.setAttribute("value", "wc_privado");

          var lbl_wc = document.createElement('label');
          lbl_wc.innerHTML = "&nbsp;WC Privado";

          var cb_varanda = document.createElement('input');
          cb_varanda.setAttribute("type", "checkbox");
          cb_varanda.setAttribute("name", "caracteristicas_quarto"+num)
          cb_varanda.setAttribute("value", "varanda");

          var lbl_varanda = document.createElement('label');
          lbl_varanda.innerHTML = "&nbsp;Possui varanda";

          var lbl_fotos = document.createElement('label');
          lbl_fotos.innerHTML = "Fotos do quarto:";

          var input_foto1 = document.createElement('input');
          input_foto1.setAttribute("type", "file");
          input_foto1.setAttribute("class", "form-control-file");

          var input_foto2 = document.createElement('input');
          input_foto2.setAttribute("type", "file");
          input_foto2.setAttribute("class", "form-control-file");

          div.appendChild(document.createElement('br'));
          div.appendChild(lbl_num);
          div.appendChild(document.createElement('br'));
          div.appendChild(lbl_detalhes);
          div.appendChild(document.createElement('br'));
          div.appendChild(lbl_renda);
          div.appendChild(lbl_valor_renda);
          div.appendChild(input_renda);
          div.appendChild(document.createElement('br'));
          div.appendChild(cb_wc);
          div.appendChild(lbl_wc);
          div.appendChild(document.createElement('br'));
          div.appendChild(cb_varanda);
          div.appendChild(lbl_varanda);
          div.appendChild(document.createElement('br'));
          div.appendChild(lbl_fotos);
          div.appendChild(document.createElement('br'));
          div.appendChild(input_foto1);
          div.appendChild(document.createElement('br'));
          div.appendChild(input_foto2);
          document.getElementById('quartos').appendChild(div);
          div.appendChild(document.createElement('br'));
        }

        adicionaQuarto(1);

        subtrai_quarto.addEventListener('click', function(){
          num_quartos_atual = num_quartos.innerHTML;
          if(num_quartos_atual > 1){
            document.getElementById("quarto_"+num_quartos_atual).remove();
            num_quartos.innerHTML = num_quartos_atual-1;
            aviso_max.innerHTML = "";
          }else aviso_max.innerHTML = "Atingiu valor mínimo de quartos!";
        }, false);

        adiciona_quarto.addEventListener('click', function(){
          num_quartos_atual = num_quartos.innerHTML;
          if(num_quartos_atual < 6){
            adicionaQuarto(parseInt(num_quartos_atual)+parseInt(1));
            num_quartos.innerHTML = parseInt(num_quartos_atual)+parseInt(1);
            aviso_max.innerHTML = "";
          }else aviso_max.innerHTML = "Atingiu valor máximo de quartos!";
        }, false);
        </script>
      </div>
      <div class="form-group">
        <label><b>Outras informações</b></label>
        <textarea class="form-control  col-md-5" rows="3"></textarea>
      </div>
      <input type="submit" id="submeter" class="btn btn-success" value="Criar anúncio" />
    </form>
  </div>
  <br>
