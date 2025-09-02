<?php

require_once '../models/PreferenciasUsuario.php';
require_once '../repositories/PreferenciasRepository.php';

// Verificação
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $regiao = $_POST['regiao'] ?? '';
    $dias = (int)($_POST['dias'] ?? 0);

    // ADICIONAIS: Cria o objeto Model com os dados da View
    $preferenciasUsuario = new PreferenciasUsuario($nome, $regiao, $dias);

    // Instancia o Repository
    $preferenciasRepo = new PreferenciasRepository();

    // ADICIONAIS: Salva o objeto Model no banco de dados através do Repository
    $sucesso = $preferenciasRepo->salvar($preferenciasUsuario);

    if ($sucesso) {
        header('Location: ../public/sucesso.html');
    } else {
        header('Location: ../public/erro.html');
    }
    exit();
}