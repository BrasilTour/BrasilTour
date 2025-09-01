<?php
// Arquivo: views/admin_destinos.php
require_once '../controllers/DestinoController.php';
// A variável $destinos já está disponível aqui, graças ao require

// Verificação de autenticação de sessão seria aqui
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
    <title>Gerenciar Destinos</title>
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
        <section class="grid-container formulario">
            <h2>Cadastrar Novo Destino</h2>
            <form action="../controllers/DestinoController.php" method="post">
                <input type="hidden" name="id" value="">
                <div class="flex-item">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="flex-item">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" required>
                </div>
                <div class="flex-item">
                    <label for="estado">Estado:</label>
                    <input type="text" id="estado" name="estado" maxlength="2" required>
                </div>
                <div class="flex-item">
                    <label for="preco_diaria">Preço Diária:</label>
                    <input type="number" step="0.01" id="preco_diaria" name="preco_diaria" required>
                </div>
                <button type="submit">Salvar Destino</button>
            </form>
        </section>

        <section>
            <h2>Destinos Cadastrados</h2>
            <table class="tabela-destinos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Preço/Diária</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($destinos) > 0): ?>
                        <?php foreach ($destinos as $destino): ?>
                            <tr>
                                <td><?= htmlspecialchars($destino['id']) ?></td>
                                <td><?= htmlspecialchars($destino['nome']) ?></td>
                                <td><?= htmlspecialchars($destino['cidade']) ?></td>
                                <td><?= htmlspecialchars($destino['estado']) ?></td>
                                <td>R$ <?= number_format($destino['preco_diaria'], 2, ',', '.') ?></td>
                                <td>
                                    <a href="#">Editar</a> |
                                    <a href="../controllers/DestinoController.php?action=excluir&id=<?= htmlspecialchars($destino['id']) ?>">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center;">Nenhum destino cadastrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>