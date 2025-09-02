<?php
require_once '../config/database.php';
require_once '../models/Destino.php';

class DestinoRepository {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Funcionalidade 3: Cadastro de Destinos
    // Agora o método recebe um objeto Destino como parâmetro
    public function salvar(Destino $destino): bool {
        $sql = "INSERT INTO destinos (nome, cidade, estado, preco_diaria) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $destino->getNome(),
            $destino->getCidade(),
            $destino->getEstado(),
            $destino->getPrecoDiaria()
        ]);
    }

    // Funcionalidade 4: Listagem de Destinos
    public function buscarTodos(): array {
        $sql = "SELECT * FROM destinos";
        $stmt = $this->conn->query($sql);
        $destinosArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $destinosObjetos = [];
        foreach ($destinosArray as $data) {
            $destinosObjetos[] = new Destino($data['nome'], $data['cidade'], $data['estado'], $data['preco_diaria'], $data['id']);
        }
        return $destinosObjetos; // Retorna uma lista de objetos
    }

    // Funcionalidade 5: Edição de Destinos
    public function atualizar(Destino $destino): bool {
        $sql = "UPDATE destinos SET nome = ?, cidade = ?, estado = ?, preco_diaria = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $destino->getNome(),
            $destino->getCidade(),
            $destino->getEstado(),
            $destino->getPrecoDiaria(),
            $destino->getId()
        ]);
    }

    // Funcionalidade 6: Exclusão de Destinos
    public function excluir(int $id): bool {
        $sql = "DELETE FROM destinos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    // ADICIONAIS
    public function buscarPorId(int $id): ?Destino {
        $sql = "SELECT * FROM destinos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$data) {
            return null;
        }

        return new Destino($data['nome'], $data['cidade'], $data['estado'], $data['preco_diaria'], $data['id']);
    }
}