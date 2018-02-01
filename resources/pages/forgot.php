<div style="text-align: center;">

  <h2>Recuperar Palavra-Passe</h2><br>

  <h6>Introduza em baixo o email associado à sua conta, e clique em "Recuperar". <br>Receberá posteriormente um email onde poderá facilmente criar uma nova palavra passe.</h6>
  <br><input type="email" id="emailrecupera" name="emailrecupera" placeholder="Insira o seu e-mail" autofocus="" required size="32" minlength="8" maxlength="254">
  <br><br>
  <form method="post">
    <a class="btn btn-success" href='?action=forgot?hello=true' role="button" id="recupera" name="recupera"  >Recuperar</a>
  </form>
  <br>
  <br>
</div>


<?php
/*function runMyFunction() {
echo 'I just ran a php function';
}
*/

/*
if(isset($_GET["hello"])) {

alert("ola");
}*/


if(array_key_exists('recupera',$_POST)){
  testfun();
}

function testfun(){
  echo "Your test function on button click is working";
}

function enviaemail(){
  $to      = 'rui_almeida_96@hotmail.com';
  $subject = 'OLA';
  $message = 'hello';
  $headers = 'From: patroll.cs1.6@gmail.com' . "\r\n" .
  'Reply-To: patroll.cs1.6@gmail.com' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();
  mail($to, $subject, $message, $headers);
}
?>
