<?php

class PreferenciasUsuario {
    private ?int $id;
    private string $nome_usuario;
    private string $preferencia_regiao;
    private int $duracao_dias;

    public function __construct(string $nome_usuario, string $preferencia_regiao, int $duracao_dias, ?int $id = null) {
        $this->id = $id;
        $this->nome_usuario = $nome_usuario;
        $this->preferencia_regiao = $preferencia_regiao;
        $this->duracao_dias = $duracao_dias;
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getNomeUsuario(): string { return $this->nome_usuario; }
    public function getPreferenciaRegiao(): string { return $this->preferencia_regiao; }
    public function getDuracaoDias(): int { return $this->duracao_dias; }

    // Setters
    public function setId(int $id): void { $this->id = $id; }
    public function setNomeUsuario(string $nome_usuario): void { $this->nome_usuario = $nome_usuario; }
    public function setPreferenciaRegiao(string $preferencia_regiao): void { $this->preferencia_regiao = $preferencia_regiao; }
    public function setDuracaoDias(int $duracao_dias): void { $this->duracao_dias = $duracao_dias; }
}