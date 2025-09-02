# Brasil Tour: Sistema de Gestão de Turismo

Este é um projeto de software para um site de turismo no Brasil. O sistema foi desenvolvido com uma arquitetura **Model-View-Controller (MVC)**, garantindo uma organização clara, escalável e de fácil manutenção.

## Funcionalidades Principais

-   **Cadastro de Usuário:** Sistema de registro completo para novos usuários.
-   **Login:** Autenticação de usuários para acesso restrito.
-   **Gerenciamento de Itinerários:** Ferramenta para criar e gerenciar roteiros de viagem.
-   **Banco de Dados:** Estrutura para armazenamento e gestão de dados do projeto.

## Arquitetura do Projeto

O projeto segue o padrão de design MVC com a seguinte organização de diretórios:

**config/:** Contém arquivos de configuração, como o database.php, que é responsável por gerenciar a conexão com o banco de dados.
<br><br>
**controllers/:** Gerencia o fluxo de controle, processando a entrada do usuário e coordenando a interação entre as outras pastas. É aqui que arquivos como AuthController.php e DestinoController.php estão localizados.
<br><br>
**models/:** Contém as classes que representam os dados e as regras de negócio do seu projeto. É onde fica a lógica para o objeto PreferenciasUsuario.php.
<br><br>
**repositories/:** Contém a lógica de dados, as regras de negócio e a interação direta com o banco de dados (SQL). Essa pasta foi criada para separar o acesso aos dados da representação dos dados, tornando a arquitetura mais organizada. É aqui que você encontra arquivos como UsuarioRepository.php e DestinoRepository.php.
<br><br>
**public/:** Armazena arquivos que são diretamente acessíveis pelo navegador, como o index.html, admin_login.html e o arquivo de estilo style.css.
<br><br>
**views/:** Responsável pela apresentação da interface do usuário (HTML e CSS). Os arquivos do painel administrativo, como admin_destinos.php e admin_usuarios.php, vivem nesta pasta.


