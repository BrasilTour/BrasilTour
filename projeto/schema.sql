-- Tabela para os usuários (Funcionalidades de Login e Gerenciamento)
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo_perfil VARCHAR(20) NOT NULL
);

-- Insere um usuário admin para testes
INSERT INTO usuarios (usuario, senha, tipo_perfil) VALUES ('admin', 'admin123', 'admin');

-- Tabela para as preferências dos usuários (Funcionalidade de Roteiro Mágico)
CREATE TABLE IF NOT EXISTS preferencias_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL,
    preferencia_regiao VARCHAR(50) NOT NULL,
    duracao_dias INT NOT NULL
);

-- Tabela para os destinos (Funcionalidades de Gerenciamento de Destinos)
CREATE TABLE IF NOT EXISTS destinos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    preco_diaria DECIMAL(10, 2) NOT NULL
);

-- Tabela para os roteiros (Funcionalidades de Busca e Visualização de Roteiros)
CREATE TABLE IF NOT EXISTS roteiros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_roteiro VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    id_preferencia INT,
    FOREIGN KEY (id_preferencia) REFERENCES preferencias_usuario(id)
);
