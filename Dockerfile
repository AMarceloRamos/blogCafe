# Usar la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias para PHP (como pdo, pdo_pgsql, etc.)
RUN docker-php-ext-install pdo pdo_pgsql

# Habilitar mod_rewrite de Apache si es necesario
RUN a2enmod rewrite

# Copiar los archivos de tu aplicación al contenedor
COPY . /var/www/html/

# Cambiar los permisos de los archivos para que Apache pueda acceder
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Iniciar Apache en primer plano
CMD ["apache2-foreground"]
