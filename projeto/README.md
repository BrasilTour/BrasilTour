# Brasil Tour: Sistema de Gestão de Turismo

Este é um projeto de software para um site de turismo no Brasil. O sistema foi desenvolvido com uma arquitetura **Model-View-Controller (MVC)**, garantindo uma organização clara, escalável e de fácil manutenção.

## Funcionalidades Principais

-   **Cadastro de Usuário:** Sistema de registro completo para novos usuários.
-   **Login:** Autenticação de usuários para acesso restrito.
-   **Gerenciamento de Itinerários:** Ferramenta para criar e gerenciar roteiros de viagem.
-   **Banco de Dados:** Estrutura para armazenamento e gestão de dados do projeto.

## Arquitetura do Projeto

O projeto segue o padrão de design **MVC** com a seguinte organização de diretórios:

-   **`models/`**: Contém a lógica de dados, as regras de negócio e a interação com o banco de dados (SQL).
-   **`views/`**: Responsável pela apresentação da interface do usuário (HTML e CSS).
-   **`controllers/`**: Gerencia o fluxo de controle, processando a entrada do usuário e coordenando a interação entre as `Models` e as `Views`.
-   **`public/`**: Armazena arquivos estáticos, como imagens, CSS e JavaScript.

