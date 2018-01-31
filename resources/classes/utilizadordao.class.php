<?php
//Obter classes necessárias
require_once(__DIR__.'/basedados.class.php');
require_once(__DIR__.'/utilizador.class.php');

class GereUtilizador {
  private $utilizadores = array ();

  /*
  * Função que permite inserir um utilizador no sistema
  * @param utilizador Objeto Utilizador com os dados a inserir no sistema.
  * @return TRUE se a inserção ocorre com sucesso, FALSE se ocorreu um erro
  */
  public function inserir_utilizador(Utilizador $utilizador) {
		$nome = $utilizador->get_nome();
		$email = $utilizador->get_email();
		$password = $utilizador->get_password();
		$contacto = $utilizador->get_contacto();
		$tipo = ($utilizador->get_tipo() ? 1 : 0);
		$estado = $utilizador->get_estado();

		$bd = new BaseDados();
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

  /*
  * Função que permite editar os dados de um utilizador no sistema
  * @param utilizador Objeto Utilizador com os dados do utilizador a editar no sistema.
  * @return TRUE se a atualização ocorre com sucesso, FALSE se ocorreu um erro
  */
  public function editar_utilizador(Utilizador $utilizador) {
		$nome = $utilizador->get_nome();
    $email = $utilizador->get_email();
		$password = $utilizador->get_password();
		$contacto = $utilizador->get_contacto();

		$bd = new BaseDados();
		$STH = $bd->DBH->prepare("UPDATE utilizadores SET U_Nome = ?, U_Email = ?, U_Password = ?, U_Contacto = ? WHERE U_ID = $utilizador->get_id()");
		$STH->bindParam(1, $nome);
		$STH->bindParam(2, $email);
		$STH->bindParam(3, $password);
		$STH->bindParam(4, $contacto);
		$res = $STH->execute();
		$bd->desligar_bd();
		return $res;
	}

  /*
  * Função que permite verificar se um email existe
  * @param email E-mail a ser verificado.
  * @return TRUE se existe, FALSE se não existe
  */
  public function email_existe($email) {
    $bd = new BaseDados();
    $bd->ligar_bd();
    $STH = $bd->dbh->prepare("SELECT 1 FROM utilizador WHERE U_EMAIL LIKE ?");
    $STH->bindParam(1, $email);
    $STH->execute();
    $bd->desligar_bd();
    if($STH->fetch(PDO::FETCH_ASSOC)){
      return true;
    }
    return false;
	}

  /*
  * Função que permite verificar se a password introduzida é a correta e está associada ao email introduzido
  * @param email E-mail a ser verificado
  * @param $password Password a ser verificada
  * @return TRUE se a password inserida está correta e encontra-se associada ao email introduzido, FALSE caso contrário
  */
  public function password_correta($email, $password) {
    $bd = new BaseDados();
    $bd->ligar_bd();
    $STH = $bd->dbh->prepare("SELECT U_ID,U_PASSWORD,U_TIPO FROM utilizador WHERE U_EMAIL=? AND U_ESTADO=1");
    $STH->bindParam(1, $email);
    $STH->execute();
    $bd->desligar_bd();
    $row = $STH->fetch(PDO::FETCH_ASSOC);
    if($STH->rowCount()>0){
      if(password_verify($password, $row['U_PASSWORD'])){
        session_start();
        $_SESSION['U_ID'] = $row['U_ID'];
        $_SESSION['U_TIPO'] = $row['U_TIPO'];
        return true;
      }
    }
    return false;
  }

  /*
  * Função que permite obter os dados de um utilizador existente no sistema, através do seu e-mail
  * @param email E-mail do utilizador.
  * @return objeto Utilizador com os dados obtidos na pesquisa
  */
  public function obter_detalhes_utilizador_email($email) {
    $bd = new BD ();
    $STH = $bd->DBH->query ( "SELECT * FROM utilizadores WHERE U_Email = '$email'" );
    $STH->setFetchMode ( PDO::FETCH_NUM );
    $row = $STH->fetch ();
    $utilizador = new Utilizador ( $row [0], $row [1], $row [2], $row [3], $row [4], $row [5], $row[6] );
    $bd->desligar_bd ();
    return $utilizador;
  }

  /*
  * Função que permite obter os dados de um utilizador existente no sistema, através do seu ID
  * @param id ID do utilizador.
  * @return objeto Utilizador com os dados obtidos na pesquisa
  */
  public function obter_detalhes_utilizador_id($id) {
    $bd = new BD ();
    $STH = $bd->DBH->query ( "SELECT * FROM utilizadores WHERE U_ID = $id" );
    $STH->setFetchMode ( PDO::FETCH_NUM );
    $row = $STH->fetch ();
    $utilizador = new Utilizador ( $row [0], $row [1], $row [2], $row [3], $row [4], $row [5], $row[6] );
    $bd->desligar_bd ();
    return $utilizador;
  }

  /*
  * Função que permite obter os dados de todos os gestores existentes no sistema
  * @return array de objetos Utilizador com os dados de cada gestor
  */
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

  /*
  * Função que permite obter os dados de todos os senhorios existentes no sistema
  * @return array de objetos Utilizador com os dados de cada senhorio
  */
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
