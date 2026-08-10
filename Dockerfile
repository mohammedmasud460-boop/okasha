FROM php:8.2-apache

# System packages + PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev libzip-dev libonig-dev libxml2-dev \
    zip unzip curl git \
    && docker-php-ext-install pdo pdo_mysql mbstring gd zip xml \
    && rm -rf /var/lib/apt/lists/*

# Fix Apache MPM conflict: remove event/worker, enable prefork
RUN rm -f /etc/apache2/mods-enabled/mpm_event.conf \
          /etc/apache2/mods-enabled/mpm_event.load \
          /etc/apache2/mods-enabled/mpm_worker.conf \
          /etc/apache2/mods-enabled/mpm_worker.load \
    && a2enmod mpm_prefork rewrite

# Node.js 20
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# PHP dependencies
COPY composer.json composer.lock ./
RUN composer install --optimize-autoloader --no-scripts --no-interaction

# Node dependencies
COPY package.json package-lock.json .npmrc ./
RUN npm ci

# Application files
COPY . .

# Build frontend
RUN npm run build

# Storage permissions
RUN mkdir -p storage/framework/{sessions,views,cache,testing} storage/logs bootstrap/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Apache config — point to /public
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]
