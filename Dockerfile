# Imagen base de PHP con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Copiar el contenido del proyecto al contenedor
COPY . /var/www/

# Establecer el DocumentRoot al directorio "public"
ENV APACHE_DOCUMENT_ROOT=/var/www/public

# Reconfigurar Apache para usar ese nuevo DocumentRoot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Dar permisos de lectura al contenido
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# Exponer el puerto que usa Railway
EXPOSE 8080

# Iniciar Apache
CMD ["apache2-foreground"]
