# 🚗 Projeto BackEnd - Laravel - PneusMax

Este é o backend do sistema **PneusMax**, desenvolvido em **Laravel** para gerenciamento de pneus, especificações, usuários e registro de ações no sistema.

## 📌 Funcionalidades

O sistema PneusMax oferece as seguintes funcionalidades:

-   **Gerenciamento Completo de Pneus (CRUD):**
    -   **Cadastro:** Adição de novos pneus com suas informações básicas (marca, modelo, aro, medida, preço, quantidade em estoque) e suas especificações técnicas detalhadas.
    -   **Listagem:** Visualização de todos os pneus cadastrados em um painel intuitivo.
    -   **Edição:** Atualização de informações de pneus existentes.
    -   **Exclusão (Soft Delete):** Remoção lógica de pneus e suas especificações associadas, permitindo a recuperação futura e mantendo a integridade dos logs.

-   **Gerenciamento de Especificações Técnicas:**
    -   Cadastro e associação de características como largura, perfil, índices de peso e velocidade, tipo de construção, tipo de terreno e desenho para cada pneu.

-   **Controle de Usuários:**
    -   **Sistema de Autenticação Completo:** Registro e login de usuários implementados com o scaffolding do Laravel Breeze, garantindo a segurança das senhas através de hashing.
    -   **Restrição de Acesso:** Rotas e funcionalidades protegidas por middlewares, garantindo que apenas usuários autenticados possam acessá-las.

-   **Registro de Ações (Logs):**
    -   Um sistema de log detalhado que registra todas as operações de criação, edição e exclusão de pneus, incluindo o usuário responsável e a data/hora da ação.
    -   Página dedicada para visualização do histórico completo de logs.

## 🛠️ Tecnologias Utilizadas

-   **PHP 8+:** Linguagem de programação.
-   **Laravel 10+:** Framework PHP para desenvolvimento web.
-   **MySQL/MariaDB:** Sistema de gerenciamento de banco de dados.
-   **Composer:** Gerenciador de dependências para PHP.
-   **Laravel Breeze:** Scaffolding de autenticação.
-   **PHPUnit:** Framework de testes para PHP.

## 📂 Estrutura de Banco de Dados e Modelagem

O sistema é construído sobre um banco de dados relacional com as seguintes entidades principais, e suas escolhas de modelagem visam clareza, eficiência e integridade dos dados:

-   **Pneu:**
    -   Armazena informações comerciais e de estoque (marca, modelo, aro, medida, preço, quantidade_estoque).
    -   Possui uma chave primária `id_pneu`.
    -   Implementa **Soft Deletes** (`deleted_at`) para permitir a recuperação de registros e manter o histórico de ações.

-   **Especificação:**
    -   Contém os detalhes técnicos do pneu (largura, perfil, índice_peso, índice_velocidade, tipo_construcao, tipo_terreno, desenho).
    -   Possui uma chave primária `id_especificacao`.
    -   **Relacionamento Um-para-Um (1:1) com Pneu:** Cada pneu tem uma e apenas uma especificação, e cada especificação pertence a um único pneu. Essa modelagem separa as informações comerciais das técnicas, tornando o esquema mais organizado e flexível. A exclusão lógica de um Pneu também aciona a exclusão lógica de sua Especificação associada.
    -   Implementa **Soft Deletes** (`deleted_at`).

-   **Usuário:**
    -   Gerencia as credenciais de acesso ao sistema (nome, email, senha).
    -   Possui uma chave primária `id`.
    -   As senhas são armazenadas com **hashing** para segurança.

-   **Log de Ações:**
    -   Registra todas as operações significativas (criação, edição, exclusão) realizadas nos pneus.
    -   Contém `id_log`, `id_pneu` (chave estrangeira para Pneu), `id_usuario` (chave estrangeira para Usuário), `acao` (tipo de operação) e `data_hora`.
    -   **Relacionamento Um-para-Muitos (1:N):** Um Pneu pode ter muitos Logs de Ações, e um Usuário pode realizar muitas Ações. Isso garante um histórico completo e auditável das operações no sistema.

## 🧪 Testes Automatizados

Para garantir a qualidade do código e a robustez das funcionalidades, o projeto inclui **testes unitários** automatizados, desenvolvidos com **PHPUnit**.

-   **Testes Unitários de Validação (`validacao_pneu_request_test.php`):**
    -   Verificam as regras de validação para o cadastro de novos pneus, garantindo que apenas dados válidos sejam aceitos pelo sistema.
    -   Incluem cenários de sucesso (dados válidos) e falha (dados ausentes ou inválidos).

-   **Teste Unitário do Modelo `User` (`user_test.php`):**
    -   Verifica a configuração básica do modelo de usuário, como os atributos que podem ser preenchidos em massa (`$fillable`).

-   **Convenção de Nomenclatura:** Os arquivos de teste e as classes de teste seguem a convenção `snake_case` (`*_test.php`) para facilitar a identificação e organização, configurada no `phpunit.xml`.

## 🚀 Como Executar o Projeto

Siga os passos abaixo para configurar e executar o projeto PneusMax em seu ambiente local:

### Pré-requisitos

Certifique-se de ter os seguintes softwares instalados em sua máquina:

-   **PHP >= 8.2**
-   **Composer**
-   **Node.js >= 16.x**
-   **npm >= 8.x**
-   **MySQL** ou **MariaDB** (ou outro banco de dados compatível com Laravel)

### Instalação e Configuração

1.  **Clone o repositório:**
    ```bash
    git clone https://github.com/GabrielBeledeli/Projeto-BackEnd-Laravel-PneusMax.git
    cd Projeto-BackEnd-Laravel-PneusMax
    ```

2.  **Instale as dependências do Composer:**
    ```bash
    composer install
    ```

3.  **Copie o arquivo de ambiente:**
    ```bash
    cp .env.example .env
    # Para Windows:
    # copy .env.example .env
    ```

4.  **Gere a chave da aplicação:**
    ```bash
    php artisan key:generate
    ```

5.  **Configure o banco de dados:**
    Abra o arquivo `.env` e configure as credenciais do seu banco de dados:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=pneusmax
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    *Certifique-se de que o banco de dados `pneusmax` (ou o nome que você escolher) já esteja criado em seu servidor MySQL/MariaDB.*

6.  **Execute as migrações e os seeders:**
    ```bash
    php artisan migrate --seed
    ```
    *Isso criará as tabelas no banco de dados e as populará com dados iniciais de teste.*

7.  **Instale as dependências do Node.js:**
    ```bash
    npm install
    ```

### Executando a Aplicação

Para rodar a aplicação, você precisará de dois terminais:

1.  **No primeiro terminal, inicie o servidor de desenvolvimento frontend (Vite):**
    ```bash
    npm run dev
    ```
    *Este comando compila e serve os assets JavaScript e CSS. Ele deve permanecer em execução enquanto você estiver desenvolvendo.*

2.  **No segundo terminal, inicie o servidor de desenvolvimento Laravel:**
    ```bash
    php artisan serve
    ```

### Acessando a Aplicação

Após ambos os servidores estarem em execução, abra seu navegador e acesse:

```
http://127.0.0.1:8000
```

### Para Produção

Para preparar os assets para um ambiente de produção, execute:

```bash
npm run build
```
*Este comando irá compilar e otimizar todos os seus assets frontend para serem servidos de forma estática.*

## 🧠 Autores

-   **Gabriel Beledeli Hul**
-   **Caio Eduardo Gemin Guarienti**
-   **Alisson Eraldo Da Silva**

Engenharia de Software 4A  
Centro Universitário Campo Real

> Projeto desenvolvido para fins acadêmicos e aprendizado.

---

**Sinta-se à vontade para explorar, testar e adaptar o PneusMAX!** 🚗🛞
