# Imagen base de PHP 8.2 con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias para PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Configurar Apache para usar el directorio 'public' como raíz
ENV APACHE_DOCUMENT_ROOT /var/www/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# Copiar el proyecto al contenedor
COPY . /var/www/

# Permisos correctos
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# Configurar Apache para escuchar en el puerto 8080 (Railway)
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Exponer el puerto 8080
EXPOSE 8080

# Iniciar Apache en primer plano
CMD ["apache2-foreground"]
