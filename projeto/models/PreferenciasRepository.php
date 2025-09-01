<?php
// Arquivo: models/PreferenciasUsuarioRepository.php

require_once '../config/database.php';

class PreferenciasUsuarioRepository {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Funcionalidade 1: Salva as preferências do usuário no banco de dados
    public function salvar(string $nome_usuario, string $preferencia_regiao, int $duracao_dias): bool {
        $sql = "INSERT INTO preferencias_usuario (nome_usuario, preferencia_regiao, duracao_dias) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nome_usuario, $preferencia_regiao, $duracao_dias]);
    }

    // Funcionalidade 2: Busca roteiros prontos
    // Este método é um exemplo. A lógica de busca real dependeria de como você estrutura os roteiros.
    public function buscarRoteiros(): array {
        $sql = "SELECT nome_roteiro, descricao FROM roteiros LIMIT 5";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}