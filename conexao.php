<?php


class conexao {

	private $host = "localhost";
	private $dbname = "teste";
	private $user = "root";
	private $pass = "";

	public function conectar() {
		try{
			$pdo = new PDO("mysql:host=$this->host;
							dbname=$this->dbname",
							"$this->user",
							"$this->pass");

				$pdo->exec('set charset set utf8');

				return $pdo;

		}catch(PDOException $e){
			echo "Erro ao estabelecer conexão com o banco de dados ".$e;
		}
	}
}