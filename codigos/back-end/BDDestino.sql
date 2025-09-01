-- Arquivo para criar as tabelas do banco de dados de destinos e inserir dados de exemplo.

-- Tabela para armazenar os destinos de viagem.
CREATE TABLE IF NOT EXISTS `destinos` (
  `destino_id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` TEXT,
  `imagem_url` VARCHAR(255)
);

-- Tabela para armazenar as atividades para cada destino.
CREATE TABLE IF NOT EXISTS `atividades` (
  `atividade_id` INT AUTO_INCREMENT PRIMARY KEY,
  `destino_id` INT NOT NULL,
  `nome_atividade` VARCHAR(255) NOT NULL,
  `descricao` TEXT,
  FOREIGN KEY (`destino_id`) REFERENCES `destinos`(`destino_id`)
);

-- Tabela para armazenar sugestões de hospedagem para cada destino.
CREATE TABLE IF NOT EXISTS `hospedagens` (
  `hospedagem_id` INT AUTO_INCREMENT PRIMARY KEY,
  `destino_id` INT NOT NULL,
  `nome_hotel` VARCHAR(255) NOT NULL,
  `categoria` VARCHAR(50),
  FOREIGN KEY (`destino_id`) REFERENCES `destinos`(`destino_id`)
);

-- Inserção de dados de exemplo.
INSERT INTO `destinos` (`nome`, `descricao`, `imagem_url`) VALUES
('Praia de Pipa', 'Um paraíso tropical com falésias impressionantes e águas cristalinas.', 'https://placehold.co/400x300/e9d5ff/8b5cf6?text=Pipa'),
('Fernando de Noronha', 'Arquipélago vulcânico com praias intocadas e vida marinha exuberante.', 'https://placehold.co/400x300/dbeafe/3b82f6?text=Noronha'),
('Gramado', 'Cidade charmosa na Serra Gaúcha com arquitetura europeia e clima frio.', 'https://placehold.co/400x300/fecaca/ef4444?text=Gramado');
