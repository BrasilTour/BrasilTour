-- Arquivo para criar as tabelas do banco de dados de roteiros de viagem.

-- Tabela principal para armazenar os roteiros gerados.
CREATE TABLE IF NOT EXISTS `roteiros` (
  `roteiro_id` INT AUTO_INCREMENT PRIMARY KEY,
  `usuario_id` INT NOT NULL,
  `origem` VARCHAR(255) NOT NULL,
  `destino` VARCHAR(255) NOT NULL,
  `duracao_dias` INT NOT NULL,
  `orcamento` VARCHAR(50) NOT NULL,
  `numero_viajantes` INT NOT NULL,
  `preferencias` TEXT,
  `data_geracao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela para armazenar os detalhes diários de cada roteiro.
CREATE TABLE IF NOT EXISTS `roteiro_detalhes` (
  `detalhe_id` INT AUTO_INCREMENT PRIMARY KEY,
  `roteiro_id` INT NOT NULL,
  `dia` INT NOT NULL,
  `titulo_dia` VARCHAR(255) NOT NULL,
  `manhã` TEXT,
  `tarde` TEXT,
  `noite` TEXT,
  FOREIGN KEY (`roteiro_id`) REFERENCES `roteiros`(`roteiro_id`)
);

-- Tabela para armazenar as sugestões de refeições para cada roteiro.
CREATE TABLE IF NOT EXISTS `refeicoes` (
  `refeicao_id` INT AUTO_INCREMENT PRIMARY KEY,
  `roteiro_id` INT NOT NULL,
  `tipo_refeicao` VARCHAR(50) NOT NULL,
  `local` VARCHAR(255) NOT NULL,
  FOREIGN KEY (`roteiro_id`) REFERENCES `roteiros`(`roteiro_id`)
);

-- Inserção de dados de exemplo.
INSERT INTO `roteiros` (`usuario_id`, `origem`, `destino`, `duracao_dias`, `orcamento`, `numero_viajantes`, `preferencias`) VALUES
(1, 'São Paulo, SP', 'Petrópolis, Rio de Janeiro', 1, 'Moderado', 2, 'Gostaria de opções de artesanato.');

INSERT INTO `roteiro_detalhes` (`roteiro_id`, `dia`, `titulo_dia`, `manhã`, `tarde`, `noite`) VALUES
(1, 1, 'Exploração Artesanal em Petrópolis', 'Café da manhã no Café do Simpático e visita ao Centro de Artesanato de Petrópolis.', 'Almoço no restaurante Ledo e passeio pelo Museu Imperial e pela Rua Teresa.', 'Jantar no restaurante Marius Degustare e passeio no Parque de Itaipava.');

INSERT INTO `refeicoes` (`roteiro_id`, `tipo_refeicao`, `local`) VALUES
(1, 'Café da manhã', 'Café do Simpático'),
(1, 'Almoço', 'Restaurante Ledo'),
(1, 'Jantar', 'Marius Degustare');
