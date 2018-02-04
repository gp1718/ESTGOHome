/*
* Função que valida os campos do fomulário de login
*/
function validaLogin(){
  var div = document.getElementById('divAviso1');
  var input = [document.forms["loginForm"]["email"].value, document.forms["loginForm"]["password"].value];
  var regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  if(!input[0] || !input[1]){
    div.innerHTML = "<div class='alert alert-warning' role='alert'><strong>Erro!</strong> Por favor preencha todos os campos.</div><br>";
    input[0].focus();
    return false;
  }else if(!regex.test(String(input[0]).toLowerCase())){
    div.innerHTML = "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Por favor insira um <i>e-mail</i> válido.</div><br>";
    input[0].focus();
    return false;
  }
  return true;
}
