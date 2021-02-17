<?php

//class de Conexão

class Conexao{
	private $host = 'localhost';
	private $dbname = 'dashboard';
	private $user = 'root';
	private $pass = '';

	public function conectar(){
		try{

			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname;",
				"$this->user",
				"$this->pass"
			);

			//$conexao->exec('set charset set utf8');

			return $conexao;

		} catch(PSOExeption $e){
			echo '<p>'. $e->getMessege(). '</p>';
		}
	}
}