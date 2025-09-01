-- Arquivo para criar a tabela de mensagens de contato.
-- Esta tabela é utilizada para armazenar as mensagens enviadas através do formulário de contato no site.

-- Tabela para armazenar as mensagens de contato.
CREATE TABLE IF NOT EXISTS `mensagens_contato` (
  `mensagem_id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `assunto` VARCHAR(255),
  `mensagem` TEXT NOT NULL,
  `data_envio` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserção de uma mensagem de exemplo.
INSERT INTO `mensagens_contato` (`nome`, `email`, `assunto`, `mensagem`) VALUES
('Pedro Alves', 'pedro.alves@exemplo.com', 'Dúvida sobre roteiros', 'Olá, gostaria de saber mais sobre como os roteiros são gerados.');
