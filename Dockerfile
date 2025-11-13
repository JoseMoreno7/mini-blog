# Imagen base de PHP 8.2 con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias para MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Definir la ruta donde estará tu proyecto
WORKDIR /var/www/mini-blog

# Copiar el contenido de tu proyecto local dentro del contenedor
COPY . /var/www/mini-blog/

# Configurar Apache para que use el directorio "public" como raíz del servidor
ENV APACHE_DOCUMENT_ROOT=/var/www/mini-blog/public

# Reemplazar la configuración por defecto de Apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Eliminar el warning de ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Cambiar el puerto a 8080 para Railway
RUN sed -i "s/Listen 80/Listen 8080/" /etc/apache2/ports.conf

# Exponer el puerto 8080
EXPOSE 8080

# Comando para iniciar Apache
CMD ["apache2-foreground"]
