<?php

require_once '../controllers/DestinoController.php';

// Verifica a sessão para proteger a página
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['perfil'] !== 'admin') {
    header('Location: ../public/admin_login.html');
    exit();
}

// Lógica para preencher o formulário de edição, se houver um ID na URL
$id = null;
$nome = '';
$cidade = '';
$estado = '';
$preco_diaria = '';

if (isset($_GET['action']) && $_GET['action'] === 'editar' && isset($_GET['id'])) {
    $destino_editar = $destinoRepo->buscarPorId((int)$_GET['id']);
    if ($destino_editar) {
        $id = $destino_editar->getId();
        $nome = $destino_editar->getNome();
        $cidade = $destino_editar->getCidade();
        $estado = $destino_editar->getEstado();
        $preco_diaria = $destino_editar->getPrecoDiaria();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Destinos - Brasil Tour</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <header>
        <h1>Painel de Administração</h1>
        <nav>
            <a href="admin_destinos.php">Gerenciar Destinos</a>
            <a href="admin_usuarios.php">Gerenciar Usuários</a>
            <a href="#">Sair</a>
        </nav>
    </header>

    <main>
        <section class="container">
            <h2><?= ($id ? 'Editar' : 'Cadastrar') ?> Destino</h2>
            <form action="../controllers/DestinoController.php" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                <div class="flex-item">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome) ?>" required>
                </div>
                <div class="flex-item">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" value="<?= htmlspecialchars($cidade) ?>" required>
                </div>
                <div class="flex-item">
                    <label for="estado">Estado:</label>
                    <input type="text" id="estado" name="estado" value="<?= htmlspecialchars($estado) ?>" required>
                </div>
                <div class="flex-item">
                    <label for="preco_diaria">Preço/Diária:</label>
                    <input type="number" id="preco_diaria" name="preco_diaria" step="0.01" value="<?= htmlspecialchars($preco_diaria) ?>" required>
                </div>
                <button type="submit"><?= ($id ? 'Salvar Alterações' : 'Salvar Destino') ?></button>
            </form>
        </section>

        <section class="container">
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
                                <td><?= htmlspecialchars($destino->getId()) ?></td>
                                <td><?= htmlspecialchars($destino->getNome()) ?></td>
                                <td><?= htmlspecialchars($destino->getCidade()) ?></td>
                                <td><?= htmlspecialchars($destino->getEstado()) ?></td>
                                <td>R$ <?= number_format($destino->getPrecoDiaria(), 2, ',', '.') ?></td>
                                <td>
                                    <a href="?action=editar&id=<?= htmlspecialchars($destino->getId()) ?>">Editar</a> |
                                    <a href="../controllers/DestinoController.php?action=excluir&id=<?= htmlspecialchars($destino->getId()) ?>" onclick="return confirm('Tem certeza que deseja excluir este destino?');">Excluir</a>
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

    <footer>
        <p>&copy; 2023 Brasil Tour. Todos os direitos reservados.</p>
    </footer>
</body>
</html>