<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('maquinaTroco.php');
require_once('maquinaTrocoDAO.php');

$umReal = 0;
$cinquenta = 0;
$vinteCinco = 0;
$dez = 0;
$cinco = 0;
$um = 0;

if ($_POST['umReal'])
    $umReal = intval($_POST['umReal']);

if ($_POST['cinquenta'])
    $cinquenta = intval($_POST['cinquenta']);

if ($_POST['vinteCinco'])
    $vinteCinco = intval($_POST['vinteCinco']);

if ($_POST['dez'])
    $dez = intval($_POST['dez']);

if ($_POST['cinco'])
    $cinco = intval($_POST['cinco']);

if ($_POST['um'])
    $um = intval($_POST['um']);

if ($_POST['inserirMaquina']) {
    $maquinaTrocoDao = new maquinaTrocoDAO();
    $mt = new maquinaTroco($umReal, $cinquenta, $vinteCinco, $dez, $cinco, $um);
    $maquinaTrocoDao->inserir($mt);
}

if ($_POST['campoHiddenMaquinaId']) {

    $maquinaTrocoDao = new maquinaTrocoDAO();
    $mt = $maquinaTrocoDao->buscarMaquinaTroco($_POST['campoHiddenMaquinaId']);
    $mt->abastecer($umReal, $cinquenta, $vinteCinco, $dez, $cinco, $um);
}

if ($_POST['campoHiddenMaquinaSangria']) {

    $maquinaTrocoDao = new maquinaTrocoDAO();
    $mt = $maquinaTrocoDao->buscarMaquinaTroco($_POST['campoHiddenMaquinaSangria']);
    $mt->sangrar($umReal, $cinquenta, $vinteCinco, $dez, $cinco, $um);
}

if ($_POST['campoHiddenMaquinaTroco']) {

    $maquinaTrocoDao = new maquinaTrocoDAO();
    $mt = $maquinaTrocoDao->buscarMaquinaTroco($_POST['campoHiddenMaquinaTroco']);
    $mt->trocar($_POST['totalPagar'], $_POST['pago']);
}

header("Location: ../apresentacao/maquinaTroco.php");
