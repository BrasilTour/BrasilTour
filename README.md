# Brasil Tour: Descubra o Brasil de forma mágica!

## Descrição
O projeto Brasil Tour é um sistema para criação e gerenciamento de pacotes de viagem personalizados pelo Brasil. Com ele, os usuários podem montar seu próprio "roteiro mágico", escolhendo destinos e preferências. O sistema armazena as escolhas dos usuários em um banco de dados para gerar roteiros prontos e, futuramente, utilizar inteligência artificial para otimizar as sugestões.

## Integrantes
-[Ana Luiza Lelis] - Matrícula: [12301981]
-[Isabela Valeska] - Matrícula: [12301787]
-[Guilherme Miura] - Matrícula: [12400106]
-[Leonardo Gomes] - Matrícula: [12400335]

## Estrutura de Diretórios
brasil-tour/
├── public/                 # Arquivos da interface (HTML, CSS, JS)
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── main.js
│   └── index.html
├── src/                    # Código-fonte backend (PHP, C#, etc.)
│   ├── controllers/
│   ├── models/
│   └── views/
├── database/               # Arquivos de banco de dados e scripts
│   └── schema.sql
├── README.md               # Arquivo de descrição do projeto
└── .gitignore              # Arquivos a serem ignorados pelo Git

## 10 Funcionalidades Implementadas

1.  **Montar Roteiro Mágico:** Formulário para o usuário inserir preferências de viagem.
2.  **Visualizar Roteiros Prontos:** Exibição de roteiros gerados a partir das escolhas do usuário.
3.  **Cadastro de Destinos:** Formulário para o administrador cadastrar novos locais.
4.  **Listagem de Destinos:** Exibição de todos os destinos disponíveis.
5.  **Edição de Destinos:** Funcionalidade para o administrador atualizar informações de um destino.
6.  **Exclusão de Destinos:** Opção para remover um destino do sistema.
7.  **Login de Administrador:** Autenticação para acesso às funcionalidades de gerenciamento.
8.  **Listagem de Usuários:** Exibição de todos os usuários cadastrados.
9.  **Busca de Roteiros:** Ferramenta de pesquisa por roteiros específicos.
10. **Visualização Detalhada do Roteiro:** Página com informações completas de um roteiro pronto.

## Como Executar o Projeto

### 1. Pré-requisitos
- **Linguagem:** PHP (ou C#)
- **Servidor Web:** XAMPP, WAMP ou similar com suporte a Apache e MySQL/MariaDB.
- **Banco de Dados:** MySQL ou MariaDB.

### 2. Instalação
```bash
# Clone o repositório
git clone [https://github.com/usuario/brasil-tour.git](https://github.com/usuario/brasil-tour.git)

# Acesse a pasta do projeto
cd brasil-tour
