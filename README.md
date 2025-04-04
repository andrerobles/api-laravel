# Projeto com Docker, Laravel, Mysql e PhpAdmin

Este projeto utiliza Docker para configurar um ambiente para execução de projetos laravel que utilizem o banco de dados Mysql com Phpmyadmin.

### 💻 Pré-requisitos

-   [x] Docker instalado
-   [x] Docker Compose instalado

### Estrutura

-   `docker-compose.yml`: Define a configuração dos containers Php/Laravel, Mysql e Phpmyadmin.

### 🚀 Instalação / Configuração

Copiar o arquivo `.env.example` para `.env` e realizar alterações, caso necessário.

Os arquivos `.sql` contendo as informações de dados devem ser solicitados a parte, eles são: `init.sql`, `data.sql`, `procedure.sql`, `translate.sql` e movidos para a pasta `docker`.

Entre no diretório `docker` e execute o comando para a criação do container:

```
docker-compose up -d
```

Para verificar se o container está em execução:

```
docker ps
```

Comando para entrar no container e instalar dependencias (Passo 1):

```
docker exec -it laravel_app bash
```

Instalar de dependencias no container (Passo 2):

```
composer install
```

```
npm install
```

```
php artisan key:generate
```

```
php artisan migrate:install
```

```
php artisan migrate
```

### 📝 Credencial:

-   Informação contida no arquivo `.env`

### 🚪 Portas:

-   API: 80
-   MYSQL: 3306
-   Phpmyadmin: 8000
