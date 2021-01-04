FROM php:7.4-apache
COPY /src /var/www/html
RUN chmod 777 /var/www/html/data/usuarios.json
EXPOSE 80