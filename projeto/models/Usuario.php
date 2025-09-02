<?php

class Usuario {
    private ?int $id;
    private string $usuario;
    private string $senha;
    private string $tipo_perfil;

    public function __construct(string $usuario, string $senha, string $tipo_perfil, ?int $id = null) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->tipo_perfil = $tipo_perfil;
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getUsuario(): string { return $this->usuario; }
    public function getSenha(): string { return $this->senha; }
    public function getTipoPerfil(): string { return $this->tipo_perfil; }

    // Setters
    public function setId(int $id): void { $this->id = $id; }
    public function setUsuario(string $usuario): void { $this->usuario = $usuario; }
    public function setSenha(string $senha): void { $this->senha = $senha; }
    public function setTipoPerfil(string $tipo_perfil): void { $this->tipo_perfil = $tipo_perfil; }
}