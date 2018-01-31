<?php
class GereUtilizador {
  public function inserir_utilizador(Utilizador $utilizador) {
		$nome = $utilizador->get_nome();
		$email = $utilizador->get_email();
		$password = $utilizador->get_password();
		$contacto = $utilizador->get_contacto();
		$tipo = ($utilizador->get_tipo() ? 1 : 0);
		$estado = $utilizador->get_estado();

		$bd = new BD ();
		$STH = $bd->DBH->prepare("INSERT INTO utilizadores (nome, email, password, contacto, tipo, estado) values (?, ?, ?, ?, ?, ?)");
		$STH->bindParam(1, $nome);
		$STH->bindParam(2, $email);
		$STH->bindParam(3, $password);
		$STH->bindParam(4, $contacto);
		$STH->bindParam(5, $tipo);
		$STH->bindParam(6, $estado);
		$res = $STH->execute ();
		$bd->desligar_bd ();
		return $res;
	}

  public function editar_utilizador(Utilizador $utilizador) {
		$nome = $utilizador->get_nome();
    $email = $utilizador->get_email();
		$password = $utilizador->get_password();
		$contacto = $utilizador->get_contacto();

		$bd = new BD ();
		$STH = $bd->DBH->prepare("UPDATE utilizadores SET U_Nome = ?, U_Email = ?, U_Password = ?, U_Contacto = ? WHERE U_ID = $utilizador->get_id()");
		$STH->bindParam(1, $nome);
		$STH->bindParam(2, $email);
		$STH->bindParam(3, $password);
		$STH->bindParam(4, $contacto);
		$res = $STH->execute();
		$bd->desligar_bd();
		return $res;
	}
}
