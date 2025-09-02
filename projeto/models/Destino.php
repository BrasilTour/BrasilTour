<?php

class Destino {
    private ?int $id;
    private string $nome;
    private string $cidade;
    private string $estado;
    private float $preco_diaria;

    public function __construct(string $nome, string $cidade, string $estado, float $preco_diaria, ?int $id = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->preco_diaria = $preco_diaria;
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getCidade(): string { return $this->cidade; }
    public function getEstado(): string { return $this->estado; }
    public function getPrecoDiaria(): float { return $this->preco_diaria; }

    // Setters
    public function setId(int $id): void { $this->id = $id; }
    public function setNome(string $nome): void { $this->nome = $nome; }
    public function setCidade(string $cidade): void { $this->cidade = $cidade; }
    public function setEstado(string $estado): void { $this->estado = $estado; }
    public function setPrecoDiaria(float $preco_diaria): void { $this->preco_diaria = $preco_diaria; }
}