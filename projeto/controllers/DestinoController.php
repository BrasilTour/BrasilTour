<?php
// Arquivo: controllers/DestinoController.php
require_once '../models/DestinoRepository.php';

$destinoRepo = new DestinoRepository();

// Lógica para cadastrar/atualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = $_POST;
    if (isset($dados['id']) && !empty($dados['id'])) {
        // Funcionalidade 5: Edição de Destinos
        $destinoRepo->atualizar($dados);
    } else {
        // Funcionalidade 3: Cadastro de Destinos
        $destinoRepo->salvar($dados);
    }
    header('Location: ../views/admin_destinos.php'); // Redireciona para a página de listagem
    exit;
}

// Lógica para excluir (via GET, por exemplo)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'excluir') {
    // Funcionalidade 6: Exclusão de Destinos
    if (isset($_GET['id'])) {
        $destinoRepo->excluir($_GET['id']);
    }
    header('Location: ../views/admin_destinos.php');
    exit;
}

// Funcionalidade 4: Listagem de Destinos (retorna a lista para a View)
$destinos = $destinoRepo->buscarTodos();