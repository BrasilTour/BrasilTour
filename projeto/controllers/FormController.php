<?php
// Arquivo: controllers/FormController.php

require_once '../models/PreferenciasUsuarioRepository.php';

// Verifica se os dados do formulário foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega os dados do formulário com segurança
    $nome = htmlspecialchars($_POST['nome'] ?? '');
    $regiao = htmlspecialchars($_POST['regiao'] ?? '');
    $dias = (int)($_POST['dias'] ?? 0);

    // Valida os dados
    if (!empty($nome) && !empty($regiao) && $dias > 0) {
        // Cria uma instância do Repository
        $repo = new PreferenciasUsuarioRepository();

        // Chama o método do Repository para salvar os dados
        $sucesso = $repo->salvar($nome, $regiao, $dias);

        if ($sucesso) {
            // Redireciona para a página inicial com uma mensagem de sucesso
            header('Location: ../public/index.html?status=sucesso');
            exit();
        } else {
            // Redireciona em caso de falha
            header('Location: ../public/index.html?status=erro');
            exit();
        }
    } else {
        // Redireciona se os dados estiverem inválidos
        header('Location: ../public/index.html?status=erro_dados_invalidos');
        exit();
    }
}
?>