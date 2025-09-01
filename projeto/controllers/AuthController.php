<?php
// Arquivo: controllers/AuthController.php
require_once '../models/UsuarioRepository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $usuarioRepo = new UsuarioRepository();
    $usuario_autenticado = $usuarioRepo->buscarPorCredenciais($usuario, $senha);

    if ($usuario_autenticado) {
        session_start();
        $_SESSION['user_id'] = $usuario_autenticado['id'];
        $_SESSION['username'] = $usuario_autenticado['usuario'];
        $_SESSION['perfil'] = $usuario_autenticado['tipo_perfil'];
        header('Location: ../views/dashboard.php'); // Redireciona para o painel
        exit;
    } else {
        header('Location: ../views/login.php?error=credenciais_invalidas');
        exit;
    }
}