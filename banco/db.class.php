<?php
/*
* Classe de banco de dados Mysql - apenas uma conexão permitida
*/
class Database {
	private $_connection;
	private static $_instance; //A instância única
	// banco online
	private $_host = "exitus.cluster-ckj8iriwfmob.us-east-1.rds.amazonaws.com";
	private $_username = "master";
	private $_password = "Exitus2018#";
	private $_database = "natura";

	// banco local
	// private $_host = "localhost";
	// private $_username = "root";
	// private $_password = "";
	// private $_database = "scidep";
	/*
	Obtenha uma instância do banco de dados
	@retorna Instância
	*/
	public static function getInstance() {
		if(!self::$_instance) { // Se não tem nenhuma instância, faz uma
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	// Construtor
	private function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database);
		
		//ajustar o charset de comunicação entre a aplicação e o banco de dados
		mysqli_set_charset($this->_connection, 'utf8');
	
		// Tratamento de erros
		if(mysqli_connect_error()) {
			trigger_error("Sistema indisponível, por favor, tente mais tarde! :( ");
			// trigger_error("Erro ao tentar se conectar com o BD MySQL: " . mysql_connect_error(), E_USER_ERROR);
		}
	}
	// O clone do método Magic está vazio para evitar a duplicação de conexão
	private function __clone() { }
	// Obter conexão mysqli 
	public function getConnection() {
		return $this->_connection;
	}
}
?>
