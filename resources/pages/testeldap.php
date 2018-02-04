<?php
//Ficheiro criado apenas para testar a configuração do LDAP (rede interna da ESTGOH)

$utilizador = 'lei1630xx';
$password = '******';

$ldap_server = "192.168.135.1";
$ldap_user = 'uid='.$utilizador.',ou=Users,dc=estgoh,dc=ipc.pt';
$ldap_password = $password;

$ldap = ldap_connect($ldap_server) or die("Erro na ligação.");

ldap_set_option($ldap, LDAP_OPT_NETWORK_TIMEOUT, 2);
ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

if($ldap){
  $ldap_bind = @ldap_bind($ldap, $ldap_user, $ldap_password) or die ("Error trying to bind: ".ldap_error($ldap));

  if($ldap_bind){
    echo "Bem-vindo!";
  }else{
    echo "Não conseguiu autenticar.";
  }
}

 ?>
