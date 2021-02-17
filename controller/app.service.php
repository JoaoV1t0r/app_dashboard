<?php

class Bd{
	private $conexao;
	private $dashboard;

	public function __construct(Conexao $conexao, Dashboard $dashboard){
		$this->conexao = $conexao->conectar();
		$this->dashboard = $dashboard;
	}

	public function getNumeroVendas(){
		$query = "select count(*) as numero_vendas from tb_vendas where data_venda between :data_inicio and :data_fim ";

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->data_inicio );
		$stmt->bindValue(':data_fim', $this->dashboard->data_fim);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC); 
	}

	public function getTotalVendas(){
		$query = "select sum(total) as total_vendas from tb_vendas where data_venda between :data_inicio and :data_fim ";

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->data_inicio );
		$stmt->bindValue(':data_fim', $this->dashboard->data_fim);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC); 
	}

	public function getDespesas(){
		$query = "select sum(total) as despesas from tb_despesas where data_despesa between :data_inicio and :data_fim ";

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->data_inicio );
		$stmt->bindValue(':data_fim', $this->dashboard->data_fim);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC); 
	}

	public function getClientesAtivos(){
		$query = "select count(*) as cliente_ativo from tb_clientes where cliente_ativo = 1";

		$stmt = $this->conexao->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC); 
	}

	public function getClientesInativos(){
		$query = "select count(*) as cliente_ativo from tb_clientes where cliente_ativo = 0";

		$stmt = $this->conexao->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC); 
	}

	public function getElogios(){
		$query = "select count(*) as tipo_contato from tb_contatos where tipo_contato = 1";

		$stmt = $this->conexao->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC); 
	}

	public function getReclamacoes(){
		$query = "select count(*) as tipo_contato from tb_contatos where tipo_contato = 2";

		$stmt = $this->conexao->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC); 
	}

	public function getSugestoes(){
		$query = "select count(*) as tipo_contato from tb_contatos where tipo_contato = 3";

		$stmt = $this->conexao->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC); 
	}
}