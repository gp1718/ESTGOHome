<?php
class GereUtilizador {
  private $utilizadores = array ();
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
		$res = $STH->execute();
		$bd->desligar_bd();
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

  public function obter_detalhes_utilizador_email($email) {
    $bd = new BD ();
    $STH = $bd->DBH->query ( "SELECT * FROM utilizadores WHERE U_Email = '$email'" );
    $STH->setFetchMode ( PDO::FETCH_NUM );
    $row = $STH->fetch ();
    $utilizador = new Utilizador ( $row [0], $row [1], $row [2], $row [3], $row [4], $row [5], $row[6] );
    $bd->desligar_bd ();
    return $utilizador;
  }

  public function obter_detalhes_utilizador_id($id) {
    $bd = new BD ();
    $STH = $bd->DBH->query ( "SELECT * FROM utilizadores WHERE U_ID = $id" );
    $STH->setFetchMode ( PDO::FETCH_NUM );
    $row = $STH->fetch ();
    $utilizador = new Utilizador ( $row [0], $row [1], $row [2], $row [3], $row [4], $row [5], $row[6] );
    $bd->desligar_bd ();
    return $utilizador;
  }

  public function obter_todos_gestores() {
		$bd = new BD ();
		$STH = $bd->DBH->query ( "SELECT * FROM utilizadores WHERE U_Tipo = 1" );
		if ($STH->rowCount () == 0)
			return null;
		$STH->setFetchMode ( PDO::FETCH_NUM );
		while ( $row = $STH->fetch () ) {
			$this->utilizadores [] = new Utilizador ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
		}
		$bd->desligar_bd ();
		return $this->utilizadores;
	}

  public function obter_todos_senhorios() {
		$bd = new BD ();
		$STH = $bd->DBH->query ( "SELECT * FROM utilizadores WHERE U_Tipo = 2" );
		if ($STH->rowCount () == 0)
			return null;
		$STH->setFetchMode ( PDO::FETCH_NUM );
		while ( $row = $STH->fetch () ) {
			$this->utilizadores [] = new Utilizador ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
		}
		$bd->desligar_bd ();
		return $this->utilizadores;
	}
}
