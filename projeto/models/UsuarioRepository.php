<?php
//Funcionalidade 7 e 8
// Arquivo: models/UsuarioRepository.php
require_once '../config/database.php';

class UsuarioRepository {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Funcionalidade 7: Autenticação de Login
    public function buscarPorCredenciais(string $usuario, string $senha): ?array {
        $sql = "SELECT id, usuario, tipo_perfil FROM usuarios WHERE usuario = ? AND senha = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$usuario, $senha]); // A senha deve ser criptografada na prática!
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    // Funcionalidade 8: Listagem de Usuários (para admin)
    public function buscarTodos(): array {
        $sql = "SELECT id, usuario, tipo_perfil FROM usuarios";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}