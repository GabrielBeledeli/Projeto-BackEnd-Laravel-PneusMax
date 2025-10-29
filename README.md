# 🚗 Projeto BackEnd - Laravel - PneusMax

Este é o backend do sistema **PneusMax**, desenvolvido em **Laravel** para gerenciamento de pneus, especificações, usuários e registro de ações no sistema.

## 📌 Funcionalidades Principais

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
 
 # 🧠 Padrões de Projeto Implementados

Com o objetivo de tornar o código **mais modular, reutilizável e fácil de manter**, o projeto PneusMax aplica diversos **Design Patterns (Padrões de Projeto)** reconhecidos na engenharia de software:

🔹 **Strategy Pattern — Sistema de Logs**

**Implementação:**

Interface: LogStrategyInterface
Estratégias concretas: LogCriacao, LogEdicao, LogExclusao
Contexto: LogContext

O sistema de logs do PneusMax utiliza o padrão Strategy para registrar ações críticas realizadas sobre os pneus. Cada tipo de operação (criação, edição, exclusão) é encapsulada em uma estratégia de log específica, que implementa a interface LogStrategyInterface.
A classe LogContext atua como orquestradora da estratégia atual, recebendo dinamicamente a estratégia apropriada e executando o método registrar() com base no pneu afetado.



**Justificativa:**
Esse padrão promove o **princípio do Aberto/Fechado (OCP)**, permitindo adicionar novas formas de registro (como logs em arquivo, envio para sistemas externos, etc.) sem alterar o código existente. A separação entre o contexto (LogContext) e as estratégias (LogCriacao, LogEdicao, LogExclusao) garante baixo acoplamento, alta coesão e flexibilidade para testes e manutenção

🔹 **Factory Method — Criação de Pneus**

**Implementação:**

Interface: PneuFactoryInterface

Implementação concreta responsável por instanciar e configurar objetos Pneu com suas dependências e dados validados.

Utilizado no **controller de pneus** para remover lógica de criação repetitiva, delegando a responsabilidade para a **fábrica**.

**Justificativa:**
O uso do Factory Method torna o código do controller mais **enxuto e coeso**, seguindo o princípio da **Responsabilidade Única (SRP)**.
Facilita ainda testes unitários e futuras modificações na forma de criação de pneus (por exemplo, criação em massa, importação de planilhas etc.).

🔹 **Command Pattern — Criação de Pneus**

**Implementação:**

Classe: CreatePneusCommand

Responsável por **encapsular toda a lógica de criação** de pneus em um único objeto de comando.

O controller apenas dispara o comando, sem precisar conhecer os detalhes de como o pneu é persistido.

**Justificativa:**
O Command Pattern desacopla **o ato de executar uma ação** (como criar um pneu) da **forma como ela é realizada**.
Isso facilita o reuso, logging, testes e eventuais filas de processamento assíncrono.


🔹 **Handler — Orquestração de Comandos**

**Implementação:**

Classe: CreatePneusCommandHandler
Responsável por intermediar a execução do comando de criação de pneus, recebendo os dados validados do controller e repassando-os ao CreatePneusCommand.
O handler atua como uma camada de orquestração, permitindo que futuras ações como validações adicionais, normalizações, logs ou disparo de eventos sejam centralizadas em um único ponto.

**Justificativa:**

O uso de um handler separa a intenção de executar uma ação (controller) da execução real (command), promovendo o princípio da Separação de Responsabilidades (SRP). Também facilita testes unitários e permite evoluções futuras sem alterar o controller.



🔹 **Query Object Pattern — Listagem de Pneus**

**Implementação:**

Classe: ListarPneusQuery

Centraliza a lógica de listagem e filtragem de pneus, removendo consultas SQL/Eloquent diretas do controller.

**Justificativa:**
Garante **organização e reutilização de consultas complexas**, deixando o controller focado apenas na orquestração de requisições.
Seguindo o princípio CQRS (Command Query Responsibility Segregation), separa comandos (ações) de consultas (leituras).

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
