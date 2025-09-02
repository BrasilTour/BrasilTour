<?php

require_once '../models/Destino.php';
require_once '../repositories/DestinoRepository.php';

$destinoRepo = new DestinoRepository();
$destinos = [];
$destino_editar = null; 

// Lógica de cadastro, edição e exclusão (via POST ou GET)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = $_POST;
    
    // ADICIONAIS: Cria o objeto Destino a partir dos dados do formulário
    $destino = new Destino(
        $dados['nome'],
        $dados['cidade'],
        $dados['estado'],
        (float)$dados['preco_diaria'],
        isset($dados['id']) ? (int)$dados['id'] : null
    );

    if ($destino->getId()) {
        // Funcionalidade 5: Edição de Destinos
        $destinoRepo->atualizar($destino);
    } else {
        // Funcionalidade 3: Cadastro de Destinos
        $destinoRepo->salvar($destino);
    }
    header('Location: ../views/admin_destinos.php');
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'excluir' && isset($_GET['id'])) {
            // Funcionalidade 6: Exclusão de Destinos
            $destinoRepo->excluir((int)$_GET['id']);
            header('Location: ../views/admin_destinos.php');
            exit;
        } elseif ($_GET['action'] === 'editar' && isset($_GET['id'])) {
            // ADICIONAIS: Busca o destino para preencher o formulário
            $destino_editar = $destinoRepo->buscarPorId((int)$_GET['id']);
        }
    }
}

// Funcionalidade 4: Listagem de Destinos (retorna a lista para a View)
$destinos = $destinoRepo->buscarTodos();