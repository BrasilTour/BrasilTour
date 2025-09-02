<?php

require_once '../config/database.php';
require_once '../models/PreferenciasUsuario.php';

class PreferenciasRepository {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Funcionalidade 1: Salva as preferências do usuário
    public function salvar(PreferenciasUsuario $preferencia): bool {
        $sql = "INSERT INTO preferencias_usuario (nome_usuario, preferencia_regiao, duracao_dias) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $preferencia->getNomeUsuario(),
            $preferencia->getPreferenciaRegiao(),
            $preferencia->getDuracaoDias()
        ]);
    }
}