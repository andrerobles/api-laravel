# Projeto com Docker, Laravel, Mysql e PhpAdmin

Este projeto utiliza Docker para configurar um ambiente para execução de projetos laravel que utilizem o banco de dados Mysql com Phpmyadmin.

### 💻 Pré-requisitos

-   [x] Docker instalado
-   [x] Docker Compose instalado

### Estrutura

`docker-compose.yml` e `Dockerfile`: Define a configuração dos containers Php/Laravel, Mysql e Phpmyadmin.

### 🚀 Instalação / Configuração

Copiar o arquivo `.env.example` para `.env` e realizar alterações, caso necessário.

#### Execute os seguintes comandos em ordem:

#### Criação do container Php/Laravel, MySQL e PhpAdmin

```bash
docker-compose up -d
```

#### Entrar no container

```bash
docker exec -it laravel_app bash
```

#### Instalar dependências do Laravel

```bash
composer install
```

#### Instalar dependências do Nodejs

```bash
npm install
```

#### Gerar Chave da aplicação

```bash
php artisan key:generate
```

#### Criar estrutura base de migrações

```bash
php artisan migrate:install
```

#### Criar estrutura tabelas

```bash
php artisan migrate
```

#### Adicionar dados de usuário (login) e produtos

```bash
php artisan db:seed
```

### 📝 Credencial:

-   Usuário padrão:
    -   email: admin@corp.com
    -   password: admin

### 🚪 Portas:

-   API: 80
-   MYSQL: 3306
-   Phpmyadmin: 8080

### Execução

Foi adicionado o diretório `http`, que contem o consumo dos end-points.

Caso esteja utilizando o **VSCode** e tiver a extensão **Rest Client**, poderá executar os end-points diretamente por aqui.

Em seguida vou destacar os principais mas todos os endpoints podem ser conferidos em `http`:

**POST http://localhost:80/api/login (Login)**: Obtem token para ser utilizado nas consultas.

**GET http://localhost:80/api/products?page=5&items_per_page=30 (Lista Produtos)**: Lista produtos de forma paginada

**Importante**: É preciso passar o **token** obtido pelo end-point de login no `Authorization`.

Ex:

`Authorization: Bearer TOKEN_OBTIDO`
