<?php
// Arquivo: models/RoteiroRepository.php
//Funcionalidades 9 e 10
require_once '../config/database.php';

class RoteiroRepository {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Funcionalidade 9: Busca de Roteiros
    public function buscarPorTermo(string $termo): array {
        $sql = "SELECT * FROM roteiros WHERE nome_roteiro LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $termo = '%' . $termo . '%';
        $stmt->execute([$termo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Funcionalidade 10: Visualização Detalhada do Roteiro
    public function buscarPorId(int $id): ?array {
        $sql = "SELECT * FROM roteiros WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}