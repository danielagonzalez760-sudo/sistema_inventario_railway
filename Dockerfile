# Etapa 1: Compilar assets de frontend (Vite/Node)
FROM node:20 AS node_build
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# Etapa 2: Preparar PHP y Apache
FROM php:8.2-apache

# Instalar dependencias del sistema básicas
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    postgresql-client \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Descargar y usar el instalador optimizado de extensiones de PHP (evita errores de compilación y memoria)
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions pdo_pgsql mbstring exif pcntl bcmath gd


# Habilitar el módulo rewrite de Apache (necesario para Laravel)
RUN a2enmod rewrite

# Obtener Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos de la aplicación
COPY . .

# Copiar assets compilados desde la etapa 1
COPY --from=node_build /app/public/build ./public/build

# Copiar configuración del Virtual Host de Apache
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Instalar dependencias de PHP (sin dev dependencies para optimizar)
RUN composer install --no-dev --optimize-autoloader

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Hacer que el script de inicio sea ejecutable y corregir saltos de linea Windows
RUN sed -i 's/\r$//' /var/www/html/docker/start.sh && \
    chmod +x /var/www/html/docker/start.sh

# Exponer el puerto 80
EXPOSE 80

# Comando para iniciar la aplicación
CMD ["/var/www/html/docker/start.sh"]
