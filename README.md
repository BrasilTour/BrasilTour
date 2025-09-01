# Brasil Tour: Descubra o Brasil de forma mágica!

## Descrição
Este repositório contém os arquivos de um projeto de web development focado em formulários de cadastro, login, roteiros de viagem e gerenciamento de banco de dados, seguindo os requisitos do professor. A aplicação foi desenvolvida com HTML puro para a estrutura visual e CSS puro e classes Tailwind para o estilo, garantindo um design limpo e moderno. Os arquivos SQL fornecem a estrutura para as bases de dados de usuários, roteiros e mensagens de contato.




## Integrantes
- **[Ana Luiza Lelis]** - Matrícula: [12301981]
- **[Isabela Valeska]** - Matrícula: [12301787]
- **[Guilherme Miura]** - Matrícula: [12400106]
- **[Leonardo Gomes]** - Matrícula: [12400335]

## Turma
[3C1]

## Estrutura de Diretórios
brasil-tour/
├── public/                 # Arquivos da interface (HTML, CSS, JS)<br>
│   ├── css/<br>
│   │   └── style.css  <br>
│   ├── js/  <br>
│   │   └── main.js   <br>
│   └── index.html   <br>
├── src/                    # Código-fonte backend (PHP, C#, etc.)   <br>
│   ├── controllers/    <br>
│   ├── models/    <br>
│   └── views/    <br>
├── database/               # Arquivos de banco de dados e scripts   <br>
│   └── schema.sql    <br>
├── README.md               # Arquivo de descrição do projeto    <br>
└── .gitignore              # Arquivos a serem ignorados pelo Git

## 10 Funcionalidades Implementadas

Contém todos os arquivos HTML que compõem a parte visual da aplicação. <br>

cadastro.html: Formulário de cadastro de usuário.<br>
<br>
login.html: Formulário de login de usuário.
<br>
formulario_destino.html: Formulário para o usuário criar um roteiro de viagem personalizado.
<br>
modal_roteiro.html: Tela de resposta que exibe o roteiro gerado.
<br>
lista_usuarios.html: Página para listar os usuários cadastrados (conectado ao banco de dados).
<br>
contato.html: Formulário para os usuários enviarem mensagens.
<br>
lista_destinos.html: Página para listar os destinos disponíveis (conectado ao banco de dados).
<br>
<br>
🗄️ banco_de_dados/
Contém os scripts SQL para a criação das tabelas e a inserção de dados iniciais.
<br>
usuarios.sql: Estrutura da tabela de usuários.
<br>
roteiro_db.sql: Estrutura das tabelas para roteiros e detalhes de viagem.
<br>
auth_db.sql: Estrutura da tabela de autenticação para login e cadastro.
<br>
contato_db.sql: Estrutura da tabela para mensagens de contato.
<br>
destinos.sql: Estrutura das tabelas de destinos e atividades.
<br>
## Como Executar o Projeto

### 1. Pré-requisitos
- **Linguagem:** PHP
- **Servidor Web:** WAMP 
- **Banco de Dados:** MySQL 

### 2. Instalação
```bash
# Clone o repositório
git clone [https://github.com/usuario/brasil-tour.git](https://github.com/usuario/brasil-tour.git)

# Acesse a pasta do projeto
cd brasil-tour
