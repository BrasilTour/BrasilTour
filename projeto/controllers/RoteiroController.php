<?php

require_once '../models/Roteiro.php';
require_once '../repositories/RoteiroRepository.php';

$roteiroRepo = new RoteiroRepository();
$roteiros = [];
$roteiro_detalhe = null;

// Funcionalidade 9: Busca de Roteiros
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['q'])) {
    $termo = $_GET['q'];
    // ADICIONAIS: Retorna uma lista de objetos Roteiro
    $roteiros = $roteiroRepo->buscarPorTermo($termo);
}

// Funcionalidade 10: Visualização Detalhada do Roteiro
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    // ADICIONAIS: Retorna um único objeto Roteiro
    $roteiro_detalhe = $roteiroRepo->buscarPorId($id);
}