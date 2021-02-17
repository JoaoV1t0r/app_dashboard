<?php

require 'controller/app.model.php';
require 'controller/app.service.php';
require 'controller/conexao.php';



$dashboard = new Dashboard();

$competencia = explode('-',$_GET['competencia']);
$ano = $competencia[0];
$mes = $competencia[1];
$dia_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
$dataInicio = $ano . '-' .$mes . '-01';
$dataFim = $ano . '-' .$mes . '-' .$dia_mes;


$dashboard->data_inicio = $dataInicio;
$dashboard->data_fim = $dataFim;


$conexao = new Conexao();

$bd = new Bd($conexao, $dashboard);

$dashboard->numeroVendas = $bd->getNumeroVendas()['numero_vendas'];
$dashboard->totalVendas = $bd->getTotalVendas()['total_vendas'];
$dashboard->clientesAtivos = $bd->getClientesAtivos()['cliente_ativo'];
$dashboard->clientesInativos = $bd->getClientesInativos()['cliente_ativo'];
$dashboard->elogios = $bd->getElogios()['tipo_contato'];
$dashboard->reclamacoes = $bd->getReclamacoes()['tipo_contato'];
$dashboard->sugestoes = $bd->getSugestoes()['tipo_contato'];
$dashboard->despesas = $bd->getDespesas()['despesas'];


echo json_encode($dashboard);



/*
echo '<pre>';
print_r($dashboard);
echo '</pre>';
*/