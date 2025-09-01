-- Arquivo para criar a tabela de usuários e inserir dados de exemplo.
-- Este script pode ser executado em um sistema de gerenciamento de banco de dados (ex: MySQL, PostgreSQL).

-- Criação da tabela de usuários para armazenar as informações de cadastro.
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `senha` VARCHAR(255) NOT NULL,
  `data_cadastro` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserção de dados de exemplo na tabela de usuários.
INSERT INTO `usuarios` (`nome`, `email`, `senha`) VALUES
('João da Silva', 'joao.silva@email.com', 'senha123'),
('Maria Oliveira', 'maria.oliveira@email.com', 'senha456'),
('Carlos Pereira', 'carlos.pereira@email.com', 'senha789');

-- Consulta de exemplo para selecionar todos os usuários.
SELECT * FROM `usuarios`;
