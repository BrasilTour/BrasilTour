-- Arquivo para criar a tabela de usuários para o sistema de cadastro e login.
-- Esta tabela é essencial para armazenar credenciais e informações básicas do usuário.

-- Tabela para armazenar as informações de cadastro e login.
CREATE TABLE IF NOT EXISTS `usuarios_auth` (
  `usuario_id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome_completo` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `senha_hash` VARCHAR(255) NOT NULL,
  `data_registro` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserção de um usuário de exemplo para teste.
-- A senha 'senha_segura123' deve ser armazenada como um hash na aplicação real.
INSERT INTO `usuarios_auth` (`nome_completo`, `email`, `senha_hash`) VALUES
('Aline Souza', 'aline.souza@email.com', 'senha_segura123_hash');
