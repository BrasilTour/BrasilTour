<?php

require_once '../repositories/UsuarioRepository.php';

$usuarioRepo = new UsuarioRepository();
$usuarios = $usuarioRepo->buscarTodos();

// Verificação de autenticação de sessão aqui
// if (!isset($_SESSION['user_id'])) {
//     header('Location: ../public/admin_login.html');
//     exit();
// }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Usuários</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <header>
        <h1>Painel de Administração</h1>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="admin_destinos.php">Gerenciar Destinos</a>
            <a href="admin_usuarios.php">Gerenciar Usuários</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Usuários Cadastrados</h2>
            <table class="tabela-usuarios">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Perfil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($usuarios) > 0): ?>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td><?= htmlspecialchars($usuario['id']) ?></td>
                                <td><?= htmlspecialchars($usuario['usuario']) ?></td>
                                <td><?= htmlspecialchars($usuario['tipo_perfil']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" style="text-align: center;">Nenhum usuário cadastrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>