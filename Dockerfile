# Usar la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalar dependencias necesarias para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mysqli

# Habilitar módulos de Apache (si usas .htaccess)
RUN a2enmod rewrite

# Copiar los archivos de tu aplicación al servidor Apache
COPY . /var/www/html/

# Dar permisos a los archivos
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80 para Apache
EXPOSE 80

# Iniciar Apache cuando el contenedor arranque
CMD ["apache2-foreground"]
