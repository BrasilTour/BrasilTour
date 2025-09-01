-- Adicionar ao seu schema.sql
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL, -- Na prática, use uma senha criptografada!
    tipo_perfil VARCHAR(20) NOT NULL -- 'admin', 'cliente', etc.
);

-- Exemplo de inserção de um usuário admin para teste
INSERT INTO usuarios (usuario, senha, tipo_perfil) VALUES ('admin', 'admin123', 'admin');