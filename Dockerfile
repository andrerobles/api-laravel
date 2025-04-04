FROM php:8.2-apache

# UID/GID defaults (override via build args)
ARG UID=1000
ARG GID=1000

# Criar grupo e usuário
RUN groupadd -g ${GID} appgroup \
 && useradd -u ${UID} -g appgroup -m appuser

# Instalar dependências e extensões
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libpq-dev \
    libonig-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    libzip-dev \
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql mbstring zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Habilitar o módulo rewrite do Apache
RUN a2enmod rewrite

# Configurar o DocumentRoot do Apache para o diretório public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos do projeto
COPY . .

# Criar diretórios necessários e configurar permissões
RUN mkdir -p storage/framework/{sessions,views,cache} storage/logs bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache \
    && chown -R ${UID}:${GID} /var/www/html || true

# Mudar para o novo usuário
USER appuser

# Expor a porta do Apache e do Vite
EXPOSE 80 5173
