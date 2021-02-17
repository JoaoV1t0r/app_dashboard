<?php

//class Dashboard
class Dashboard{
	public $data_inicio;
	public $data_fim;
	public $numeroVendas;
	public $totalVendas;
	public $clientesAtivos;
	public $clientesInativos;
	public $despesas;
	public $elogios;
	public $reclamacoes;
	public $sugestoes;

	public function __get($value){
		return $this->$value;
	}
	public function __set($value, $newValue){
		$this->$value = $newValue;
		return $this;
	}
}