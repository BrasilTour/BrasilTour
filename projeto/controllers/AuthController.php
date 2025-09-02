<?php

require_once '../repositories/UsuarioRepository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $usuarioRepo = new UsuarioRepository();
    // ADICIONAIS
    $usuario_autenticado = $usuarioRepo->buscarPorCredenciais($usuario, $senha);

    if ($usuario_autenticado) {
        // ADICIONAIS
        session_start();
        $_SESSION['user_id'] = $usuario_autenticado->getId();
        $_SESSION['username'] = $usuario_autenticado->getUsuario();
        $_SESSION['perfil'] = $usuario_autenticado->getTipoPerfil();
        header('Location: ../views/admin_destinos.php');
        exit;
    } else {
        header('Location: ../public/admin_login.html?error=credenciais_invalidas');
        exit;
    }
}