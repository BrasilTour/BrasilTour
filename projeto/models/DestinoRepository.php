<?php
//Funcionalidades 3, 4, 5 e 6
// Arquivo: models/DestinoRepository.php
require_once '../config/database.php';

class DestinoRepository {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Funcionalidade 3: Cadastro de Destinos
    public function salvar(array $destino): bool {
        $sql = "INSERT INTO destinos (nome, cidade, estado, preco_diaria) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $destino['nome'],
            $destino['cidade'],
            $destino['estado'],
            $destino['preco_diaria']
        ]);
    }

    // Funcionalidade 4: Listagem de Destinos
    public function buscarTodos(): array {
        $sql = "SELECT * FROM destinos";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Funcionalidade 5: Edição de Destinos
    public function atualizar(array $destino): bool {
        $sql = "UPDATE destinos SET nome = ?, cidade = ?, estado = ?, preco_diaria = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $destino['nome'],
            $destino['cidade'],
            $destino['estado'],
            $destino['preco_diaria'],
            $destino['id']
        ]);
    }

    // Funcionalidade 6: Exclusão de Destinos
    public function excluir(int $id): bool {
        $sql = "DELETE FROM destinos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}