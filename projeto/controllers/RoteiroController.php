<?php
// Arquivo: controllers/RoteiroController.php
require_once '../models/RoteiroRepository.php';

$roteiroRepo = new RoteiroRepository();
$roteiros = [];
$roteiro_detalhe = null;

// Funcionalidade 9: Busca de Roteiros
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['q'])) {
    $termo = $_GET['q'];
    $roteiros = $roteiroRepo->buscarPorTermo($termo);
}

// Funcionalidade 10: Visualização Detalhada do Roteiro
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $roteiro_detalhe = $roteiroRepo->buscarPorId($id);
}