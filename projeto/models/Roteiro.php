<?php

class Roteiro {
    private ?int $id;
    private string $nome_roteiro;
    private string $descricao;
    private int $id_preferencia;

    public function __construct(string $nome_roteiro, string $descricao, int $id_preferencia, ?int $id = null) {
        $this->id = $id;
        $this->nome_roteiro = $nome_roteiro;
        $this->descricao = $descricao;
        $this->id_preferencia = $id_preferencia;
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getNomeRoteiro(): string { return $this->nome_roteiro; }
    public function getDescricao(): string { return $this->descricao; }
    public function getIdPreferencia(): int { return $this->id_preferencia; }

    // Setters
    public function setId(int $id): void { $this->id = $id; }
    public function setNomeRoteiro(string $nome_roteiro): void { $this->nome_roteiro = $nome_roteiro; }
    public function setDescricao(string $descricao): void { $this->descricao = $descricao; }
    public function setIdPreferencia(int $id_preferencia): void { $this->id_preferencia = $id_preferencia; }
}