<?php
$id = $_GET['id'];

require_once('resources/classes/utilizadordao.class.php');
//require_once('resources/classes/utilizador.class.php');
$DAO=new GereUtilizador();

if($DAO->obter_detalhes_utilizador_id($id)){
  $utilizador = $DAO->obter_detalhes_utilizador_id($id);
  $nomeutl = $utilizador->get_nome();
  $contactoutl = $utilizador->get_contacto();
  $emailutl = $utilizador->get_email();
  $tipoutl =$utilizador->get_tipo();
}

?>

<div class="container">
  <h2>Recuperação de Password</h2>
  <br>
  <div id="divAviso"></div>
  <form name="formNewPass" onsubmit="return validaInfo()" method="POST" action="">
    <p> Olá <?php echo $nomeutl ?>, aqui poderá recuperar a sua password em segurança. <br>Por favor introduza os seguintes valores corretamente:
      <div class="form-group">
        <label >Palavra-passe</label>
        <input type="password" class="form-control col-md-4" id="password" name="password">
        <small id="passwordHelp" class="form-text text-muted">A password deverá conter uma letra grande, um número e um símbolo</small>
      </div>
      <div class="form-group">
        <label >Confirmar palavra-passe</label>
        <input type="password" class="form-control col-md-4" id="npassword" name="npassword">
      </div>
      <input type="submit" name="btnGuardar" class="btn btn-primary" value="Guardar" /><br><br>
    </form>
  </div>


  <!--Validação javascript-->
  <script>
  /*
  * Função que valida os campos do fomulário da ediçao de informaçao
  */
  function validaInfo() {
    var res = true;
    var div = document.getElementById('divAviso');
    var input = [document.forms["formNewPass"]["password"].value, document.forms["formNewPass"]["npassword"].value];

    //Expressão regular para validar password
    var regexPassword = /^(?=.*\d)(?=.*[A-Z])(?=.*[!#$%&()*+,-.:;<=>?@_{|}~])/;

    //Limpar div que mostra os avisos
    div.innerHTML = "";

    if(String(input[0]) != ""){
      if(!regexPassword.test(String(input[0]))){
        div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> A palavra-passe deverá conter uma letra maiúscula, um número e um caractere especial.</div><br>";
        res = false;
      }
    }
    if (input[0] != input[1]) {
      div.innerHTML += "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> As palavras-passe introduzidas não são iguais.</div><br>";
      res = false;
    }
    return res;
  }
  </script>


  <?php

  if($_SERVER['REQUEST_METHOD']==='POST'){

    //Ediçao da informaçao
    if(isset($_POST['btnGuardar'])){

      require_once('resources/classes/utilizadordao.class.php');
      $DAO = new GereUtilizador();

      //Também pretende alterar a palavra-passe
      if(isset($_POST['password'], $_POST['npassword']) && !empty($_POST['password']) && !empty($_POST['npassword'])){
        if($_POST['password'] != $_POST['npassword']){
          echo '<script>alert("As passwords introduzidas não são iguais.");</script>';
          return;
        }else
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if($DAO->editar_utilizador(new Utilizador($id,$nomeutl ,$emailutl, $password, $contactoutl,$tipoutl, true))){
          echo '<script>alert("A password foi editada com sucesso.");</script>';
          header("Location: index.php");
        }
      }
    }
  }
 ?>
