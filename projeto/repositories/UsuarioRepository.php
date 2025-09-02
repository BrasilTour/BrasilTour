<?php

require_once '../config/database.php';
require_once '../models/Usuario.php';

class UsuarioRepository {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Funcionalidade 7: Autenticação de Login
    public function buscarPorCredenciais(string $usuario, string $senha): ?Usuario {
        $sql = "SELECT id, usuario, senha, tipo_perfil FROM usuarios WHERE usuario = ? AND senha = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$usuario, $senha]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new Usuario($data['usuario'], $data['senha'], $data['tipo_perfil'], $data['id']);
    }

    // Funcionalidade 8: Listagem de Usuários (para admin)
    public function buscarTodos(): array {
        $sql = "SELECT id, usuario, tipo_perfil FROM usuarios";
        $stmt = $this->conn->query($sql);
        $usuariosArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuariosObjetos = [];
        foreach ($usuariosArray as $data) {

            // ADICIONAIS: A senha não é retornada por segurança
            $usuariosObjetos[] = new Usuario($data['usuario'], '', $data['tipo_perfil'], $data['id']);
        }
        return $usuariosObjetos;
    }
}