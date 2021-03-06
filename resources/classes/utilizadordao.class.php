<?php
//Obter classes necessárias
require_once(__DIR__.'/basedados.class.php');
require_once(__DIR__.'/utilizador.class.php');

/**
 * Classe responsável por manipular objetos do tipo utilizador
 */
class GereUtilizador {
  private $utilizadores = [];

  /**
  * Função que permite inserir um utilizador no sistema
  * @param Utilizador $utilizador Objeto Utilizador com os dados a inserir no sistema.
  * @return mixed TRUE se a inserção ocorreu com sucesso, FALSE se ocorreu um erro
  */
  public function inserir_utilizador(Utilizador $utilizador) {
		$bd = new BaseDados();
    $bd->ligar_bd();
		$STH = $bd->dbh->prepare("INSERT INTO utilizador(U_NOME, U_EMAIL, U_PASSWORD, U_CONTACTO, U_TIPO, U_ESTADO) values(?, ?, ?, ?, ?, ?)");
		$STH->bindValue(1, $utilizador->get_nome());
		$STH->bindValue(2, $utilizador->get_email());
		$STH->bindValue(3, $utilizador->get_password());
		$STH->bindValue(4, $utilizador->get_contacto());
		$STH->bindValue(5, $utilizador->get_tipo());
		$STH->bindValue(6, $utilizador->get_estado());
		$res = $STH->execute();
		$bd->desligar_bd();
		return $res;
	}

  /**
  * Função que permite editar os dados de um utilizador no sistema
  * @param Utilizador $utilizador Objeto Utilizador com os dados do utilizador a editar no sistema.
  * @return mixed TRUE se a atualização ocorreu com sucesso, FALSE se ocorreu um erro
  */
  public function editar_utilizador(Utilizador $utilizador) {
		$bd = new BaseDados();
    $bd->ligar_bd();
		$STH = $bd->dbh->prepare("UPDATE utilizador SET U_NOME = ?, U_EMAIL = ?, U_PASSWORD = ?, U_CONTACTO = ? WHERE U_ID = ?");
		$STH->bindValue(1, $utilizador->get_nome());
		$STH->bindValue(2, $utilizador->get_email());
		$STH->bindValue(3, $utilizador->get_password());
		$STH->bindValue(4, $utilizador->get_contacto());
    $STH->bindValue(5, $utilizador->get_id());
		$res = $STH->execute();
		$bd->desligar_bd();
		return $res;
	}

  /**
  * Função que permite verificar se um email existe
  * @param mixed $email E-mail a ser verificado.
  * @return mixed TRUE se existe, FALSE se não existe
  */
  public function email_existe($email) {
    $bd = new BaseDados();
    $bd->ligar_bd();
    $STH = $bd->dbh->prepare("SELECT 1 FROM utilizador WHERE U_EMAIL LIKE ?");
    $STH->bindParam(1, $email);
    $STH->execute();
    $bd->desligar_bd();
    return $STH->fetch(PDO::FETCH_ASSOC);
	}

  /**
  * Função que permite verificar se a password introduzida é a correta e está associada ao email introduzido
  * @param mixed $email E-mail a ser verificado
  * @param mixed $password Password a ser verificada
  * @return mixed TRUE se a password inserida está correta e encontra-se associada ao email introduzido, FALSE caso contrário
  */
  public function password_correta($email, $password) {
    $bd = new BaseDados();
    $bd->ligar_bd();
    $STH = $bd->dbh->prepare("SELECT U_ID, U_PASSWORD, U_TIPO FROM utilizador WHERE U_EMAIL = ?");
    $STH->bindParam(1, $email);
    $STH->execute();
    $bd->desligar_bd();
    $row = $STH->fetch(PDO::FETCH_ASSOC);
    if($STH->rowCount()>0){
      if(password_verify($password, $row['U_PASSWORD'])){
        $_SESSION['U_ID'] =(int)$row['U_ID'];
        $_SESSION['U_TIPO'] =(int)$row['U_TIPO'];
        return true;
      }
    }
    return false;
  }

  /**
  * Função que permite obter os dados de um utilizador existente no sistema, através do seu e-mail
  * @param mixed $email E-mail do utilizador.
  * @return Utilizador Utilizador com os dados obtidos na pesquisa
  */
  public function obter_detalhes_utilizador_email($email) {
    $bd = new BaseDados();
    $bd->ligar_bd();
    $STH = $bd->dbh->prepare("SELECT * FROM utilizador WHERE U_EMAIL = ?");
    $STH->bindParam(1,$email);
    $STH->execute();
    $bd->desligar_bd();
    $row = $STH->fetch(PDO::FETCH_NUM);
    return new Utilizador($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
  }

  /**
  * Função que permite obter os dados de um utilizador existente no sistema, através do seu ID
  * @param mixed $id ID do utilizador.
  * @return Utilizador Utilizador com os dados obtidos na pesquisa
  */
  public function obter_detalhes_utilizador_id($id) {
    $bd = new BaseDados();
    $bd->ligar_bd();
    $STH = $bd->dbh->prepare("SELECT * FROM utilizador WHERE U_ID = ?");
    $STH->bindParam(1,$id);
    $STH->execute();
    $bd->desligar_bd();
    $row = $STH->fetch(PDO::FETCH_NUM);
    return new Utilizador($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
  }

  /**
  * Função que permite obter os dados de todos os gestores existentes no sistema
  * @return array de objetos Utilizador com os dados de cada gestor
  */
  public function obter_todos_gestores() {
		$bd = new BaseDados();
    $bd->ligar_bd();
		$STH = $bd->dbh->query("SELECT * FROM utilizador WHERE U_TIPO = 1");
		if($STH->rowCount() === 0){
      return null;
    }
		while($row = $STH->fetch(PDO::FETCH_NUM)){
			$this->utilizadores[] = new Utilizador($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
		}
		$bd->desligar_bd();
		return $this->utilizadores;
	}

  /**
  * Função que permite obter os dados de todos os senhorios existentes no sistema
  * @return array de objetos Utilizador com os dados de cada senhorio
  */
  public function obter_todos_senhorios() {
		$bd = new BaseDados();
    $bd->ligar_bd();
		$STH = $bd->dbh->query("SELECT * FROM utilizador WHERE U_TIPO = 2");
		if($STH->rowCount() === 0){
      return null;
    }
		while($row = $STH->fetch(PDO::FETCH_NUM)){
			$this->utilizadores[] = new Utilizador($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
		}
		$bd->desligar_bd();
		return $this->utilizadores;
	}

  /**
  * Função que permite verificar se uma conta de utilizador se encontra ativa
  * @param mixed $email E-mail da conta a verificar.
  * @return mixed TRUE se a conta se encontra ativa, FALSE se a conta se encontra inativa
  */
  public function conta_ativa($email) {
		$bd = new BaseDados();
    $bd->ligar_bd();
		$STH = $bd->dbh->query("SELECT 1 FROM utilizador WHERE U_EMAIL = '$email' AND U_ESTADO=1");
		$bd->desligar_bd();
		return $STH->fetch(PDO::FETCH_NUM);
	}

  /**
  * Função que permite alterar o estado de uma conta de utilizador
  * @param mixed $id ID do utilizador a alterar o estado.
  * @return mixed TRUE se alterou com sucesso, FALSE se não conseguiu alterar
  */
  public function alterar_estado_utilizador($id) {
		$bd = new BaseDados();
    $bd->ligar_bd();
		$STH = $bd->dbh->prepare("UPDATE utilizador SET U_ESTADO = NOT U_ESTADO WHERE U_ID = ?");
    $STH->bindParam(1,$id);
		$res = $STH->execute();
		$bd->desligar_bd();
    return $res;
	}

  /**
  * Função que permite inserir no sistema uma ação realizada pelo utilizador
  * @param Log $log Objeto Log com os dados da ação a inserir no sistema.
  * @param Utilizador $utilizador Objeto Utilizador com os dados do utilizador que realizou a ação.
  * @return mixed TRUE se a inserção ocorreu com sucesso, FALSE se ocorreu um erro
  */
  public function inserir_log(Log $log, Utilizador $utilizador) {
		$bd = new BaseDados();
    $bd->ligar_bd();
		$STH = $bd->dbh->prepare("INSERT INTO log(U_ID, L_ACAO, L_DATA) values(?, ?, ?)");
		$STH->bindValue(1, $utilizador->get_id());
		$STH->bindValue(2, $log->get_acao());
		$STH->bindValue(3, $log->get_data_hora());
		$res = $STH->execute();
		$bd->desligar_bd();
		return $res;
	}
}
