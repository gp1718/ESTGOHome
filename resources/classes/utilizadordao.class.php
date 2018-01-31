<?php
//Obter classes necessárias
require_once(__DIR__.'/basedados.class.php');
require_once(__DIR__.'/utilizador.class.php');

class GereUtilizador {
  private $utilizadores = array ();

  /*
  * Função que permite inserir um utilizador no sistema
  * @param utilizador Objeto Utilizador com os dados a inserir no sistema.
  * @return TRUE se a inserção ocorreu com sucesso, FALSE se ocorreu um erro
  */
  public function inserir_utilizador(Utilizador $utilizador) {
		$nome = $utilizador->get_nome();
		$email = $utilizador->get_email();
		$password = $utilizador->get_password();
		$contacto = $utilizador->get_contacto();
		$tipo = $utilizador->get_tipo();
		$estado = $utilizador->get_estado();

		$bd = new BaseDados();
    $bd->ligar_bd();
		$STH = $bd->dbh->prepare("INSERT INTO utilizador (U_NOME, U_EMAIL, U_PASSWORD, U_CONTACTO, U_TIPO, U_ESTADO) values (?, ?, ?, ?, ?, ?)");
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
  * @return TRUE se a atualização ocorreu com sucesso, FALSE se ocorreu um erro
  */
  public function editar_utilizador(Utilizador $utilizador) {
		$nome = $utilizador->get_nome();
    $email = $utilizador->get_email();
		$password = $utilizador->get_password();
		$contacto = $utilizador->get_contacto();

		$bd = new BaseDados();
    $bd->ligar_bd();
		$STH = $bd->dbh->prepare("UPDATE utilizador SET U_NOME = ?, U_EMAIL = ?, U_PASSWORD = ?, U_CONTACTO = ? WHERE U_ID = $utilizador->get_id()");
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
    $STH = $bd->dbh->prepare("SELECT U_ID, U_PASSWORD, U_TIPO FROM utilizador WHERE U_EMAIL=? AND U_ESTADO = 1");
    $STH->bindParam(1, $email);
    $STH->execute();
    $bd->desligar_bd();
    $row = $STH->fetch(PDO::FETCH_ASSOC);
    if($STH->rowCount()>0){
      if(password_verify($password, $row['U_PASSWORD'])){
        //session_start();
        $_SESSION['U_ID'] = (int)$row['U_ID'];
        $_SESSION['U_TIPO'] = (int)$row['U_TIPO'];
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
    $bd->ligar_bd();
    $STH = $bd->dbh->query ( "SELECT * FROM utilizador WHERE U_EMAIL = '$email'" );
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
    $bd->ligar_bd();
    $STH = $bd->dbh->query ( "SELECT * FROM utilizador WHERE U_ID = $id" );
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
    $bd->ligar_bd();
		$STH = $bd->dbh->query ( "SELECT * FROM utilizador WHERE U_TIPO = 1" );
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
    $bd->ligar_bd();
		$STH = $bd->dbh->query ( "SELECT * FROM utilizador WHERE U_TIPO = 2" );
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
  * Função que permite verificar se uma conta de utilizador se encontra ativa
  * @param email E-mail da conta a verificar.
  * @return TRUE se a conta se encontra ativa, FALSE se a conta se encontra inativa
  */
  public function conta_ativa($email) {
		$bd = new BD ();
    $bd->ligar_bd();
		$STH = $bd->dbh->query ( "SELECT U_ESTADO FROM utilizador WHERE U_EMAIL = '$email'" );
		$STH->setFetchMode ( PDO::FETCH_NUM );
		$row = $STH->fetch ();
		if ($row [0] == 1)
			return true;
		return false;
	}

  /*
  * Função que permite alterar o estado de uma conta de utilizador
  * @param id ID do utilizador a alterar o estado.
  */
  public function alterar_estado_utilizador($id) {
		$bd = new BD ();
    $bd->ligar_bd();
    $utilizador = obter_detalhes_utilizador_id($id);
		$STH = $bd->dbh->query ( "UPDATE utilizador SET U_ESTADO = ".($utilizador->get_estado() == 0 ? 1 : 0)." WHERE U_ID = ".$utilizador->get_id() );
		$STH->execute ();
		$bd->desligar_bd ();
	}

  /*
  * Função que permite inserir no sistema uma ação realizada pelo utilizador
  * @param log Objeto Log com os dados da ação a inserir no sistema.
  * @param utilizador Objeto Utilizador com os dados do utilizador que realizou a ação.
  * @return TRUE se a inserção ocorreu com sucesso, FALSE se ocorreu um erro
  */
  public function inserir_log(Log $log, Utilizador $utilizador) {
    $id_utilizador = $utilizador->get_id();
    $acao = $log->get_acao();
		$data_hora = $log->get_data_hora();

		$bd = new BaseDados();
    $bd->ligar_bd();
		$STH = $bd->dbh->prepare("INSERT INTO log (U_ID, L_ACAO, L_DATA) values (?, ?, ?)");
		$STH->bindParam(1, $id_utilizador);
		$STH->bindParam(2, $acao);
		$STH->bindParam(3, $data_hora);
		$res = $STH->execute();
		$bd->desligar_bd();
		return $res;
	}
}
