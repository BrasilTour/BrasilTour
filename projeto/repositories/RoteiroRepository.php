<?php

require_once '../config/database.php';
require_once '../models/Roteiro.php';
require_once '../models/Destino.php';

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
        $roteirosArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $roteirosObjetos = [];
        foreach ($roteirosArray as $data) {
            $roteirosObjetos[] = new Roteiro($data['nome_roteiro'], $data['descricao'], $data['id_preferencia'], $data['id']);
        }
        return $roteirosObjetos;
    }

    // Funcionalidade 10: Visualização Detalhada do Roteiro
    public function buscarPorId(int $id): ?Roteiro {
        $sql = "SELECT * FROM roteiros WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$data) {
            return null;
        }

        return new Roteiro($data['nome_roteiro'], $data['descricao'], $data['id_preferencia'], $data['id']);
    }
}