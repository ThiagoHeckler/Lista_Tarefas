# 📅 Agendador de Tarefas

Desenvolvido Guilherme Morigi(https://github.com/guilhermemorigi)  
Ivan Silva(https://github.com/duckbrave)  
Thiago Emanuel(https://github.com/ThiagoHeckler)  
Nathan Riffel (https://github.com/NathanRiffeL3110)

CakePHP 5.x
PostgresSQL16

Um simples, mas poderoso, agendador de tarefas construído com o framework **CakePHP 5.x**.  
Esta aplicação permite que os usuários se cadastrem, façam login e gerenciem suas próprias listas de tarefas.

---

## ✨ Funcionalidades

- 🔐 Autenticação de Usuário: Sistema de login e registro de usuários seguro.
- ✅ CRUD de Tarefas: Crie, visualize, edite e exclua suas tarefas.
- 🔒 Privacidade: Cada usuário só pode ver e gerenciar as suas próprias tarefas.
- 🧼 Interface Simples: Layout direto e funcional para facilitar o uso.

---

## 🛠 Pré-requisitos

Antes de começar, você precisa ter os seguintes softwares instalados:

- PHP 8.1+
- Composer
- PostgreSQL (ou outro banco, configurável)

---

## 🚀 Instalação

### 1. Clone o Repositório

git clone https://github.com/duckbrave/agendador-tarefa.git

cd agendador-tarefa

cd agendador (Local onde está o projeto e onde deve estar rodando composer)

### 2. Instale as Dependências

```composer install```

```composer require cakephp/authentication```


### 3. Configure o Banco de Dados

- Crie um banco de dados PostgreSQL chamado `agendador`.
- Copie o arquivo de configuração:

cp config/app_local.php
cp config/app.php


- Edite config/app_local.php com suas credenciais:

  ```  'Datasources' => [
        'default' => [
            'host' => 'localhost',
            'username' => 'SEU_USUARIO_POSTGRES',
            'password' => 'SUA_SENHA_POSTGRES',
            'database' => 'agendador',
        ],
    ],```

Edite config/app.php com suas credenciais:

    'Datasources' => [
        'default' => [
            'host' => 'localhost',
            'username' => 'SEU_USUARIO_POSTGRES',
            'password' => 'SUA_SENHA_POSTGRES',
            'database' => 'agendador',
        ],
    ],

### 4. Execute as Migrações

bin/cake migrations migrate

### 5. Inicie o Servidor de Desenvolvimento

bin/cake server

Acesse: http://localhost:8765

---

## 💡 Como Usar a Aplicação

    1. Acesse http://localhost:8765 no navegador.
    2. Crie uma conta clicando em "Criar uma conta".
    3. Faça login com suas credenciais.
    4. Gerencie suas tarefas (criar, editar, excluir).
    5. Use "Sair" para sair.

---

## 🧩 Estrutura do Projeto

config/           → Arquivos de configuração (app.php, app_local.php, routes.php)  
src/Controller/   → Controladores (TasksController, UsersController)  
src/Model/        → Entidades e Tabelas (Task.php, User.php, TasksTable.php, UsersTable.php)  
templates/        → Views da aplicação  
webroot/          → Assets públicos (CSS, JS)  

---
## Padrões de Projeto

O desenvolvimento do Agendador de Tarefas incorporou padrões de projeto para garantir a manutenibilidade, escalabilidade e organização do código. Os principais padrões identificados e/ou implementados incluem:

*   **MVC (Model-View-Controller):** Como o projeto é construído sobre o framework CakePHP, o padrão MVC é central para a arquitetura, separando a lógica de negócios (Model), a apresentação (View) e a interação do usuário (Controller).
*   **Active Record:** Utilizado para a interação com o banco de dados, facilitando o mapeamento objeto-relacional e simplificando as operações de persistência de dados.
---
## Modelagem e Diagramas

Como parte do processo de engenharia de software, foram elaborados os seguintes artefatos de modelagem para detalhar a estrutura e o comportamento do sistema:

*   **Diagrama de Casos de Uso:** Representa as interações entre os usuários (atores) e o sistema, descrevendo as funcionalidades sob a perspectiva do usuário.
*   **Diagrama de Classes:** Detalha a estrutura estática do sistema, mostrando as classes, seus atributos, métodos e relacionamentos.
*   **Diagrama de Sequência:** Ilustra a interação entre os objetos em uma sequência temporal para a realização de uma funcionalidade específica.
*   **Modelo Entidade-Relacionamento (ER):** Descreve a estrutura do banco de dados, mostrando as entidades, seus atributos e os relacionamentos entre elas.

---
## Testes

Para garantir a qualidade e a robustez do Agendador de Tarefas, foram realizados diversos tipos de testes:

*   **Testes Unitários:** Focados na validação de componentes individuais do sistema, garantindo que cada parte funcione conforme o esperado.
*   **Testes de Funcionalidade:** Verificam se as funcionalidades do sistema, como o CRUD de tarefas e a autenticação de usuários, operam corretamente de acordo com os requisitos levantados.
*   **Testes de Carga:** Avaliam o comportamento do sistema sob condições de alta demanda, verificando sua capacidade de resposta e estabilidade.
---

## 📄 Licença

Este projeto é referente trabalho de Engenharia de Software


## Demonstração

Você pode ver uma demonstração do projeto em funcionamento através do seguinte vídeo no YouTube:

[Agendador de Tarefas - Demonstração](https://youtu.be/FJ1bcdZJteE )

Desenvolvido Guilherme Morigi, Ivan Silva, Thiago Emanuel, Nathan Riffel usando CakePHP 5.x
