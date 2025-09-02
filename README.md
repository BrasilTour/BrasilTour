# Brasil Tour: Facilitando suas Viagens Pelo Brasil!

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
projeto/ <br>
├── config/ <br>
│   └── database.php <br>
├── controllers/ <br>
│   ├── AuthController.php <br>
│   ├── DestinoController.php <br>
│   ├── PreferenciasController.php <br>
│   └── RoteiroController.php <br>
├── models/ <br>
│   ├── Destino.php <br>
│   ├── PreferenciasUsuario.php <br>
│   ├── Roteiro.php <br>
│   └── Usuario.php <br>
├── repositories/ <br>
│   ├── DestinoRepository.php <br>
│   ├── PreferenciasRepository.php <br>
│   ├── RoteiroRepository.php <br>
│   └── UsuarioRepository.php <br>
├── public/ <br>
│   ├── css/ <br>
│   ├── js/ <br>
│   ├── admin_login.html <br>
│   ├── erro.html <br>
│   └── sucesso.html <br>
└── views/ <br>
    ├── admin_destinos.php <br>
    └── admin_usuarios.php <br>

    
## 10 Funcionalidades Implementadas
1.  **Montar Roteiro:** Formulário para o usuário inserir preferências de viagem.
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
- **Linguagem:** PHP
- **Servidor Web:** WAMP 
- **Banco de Dados:** MySQL 

### 2. Instalação
```bash
# Clone o repositório
git clone [https://github.com/usuario/brasil-tour.git](https://github.com/usuario/brasil-tour.git)

# Acesse a pasta do projeto
cd brasil-tour
