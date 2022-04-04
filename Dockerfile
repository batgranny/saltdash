#docker build -t my-php-site:latest .
#docker run -d -p 80:80 my-php-site:latest
FROM php:8.0-apache
WORKDIR /var/www/html
#COPY php/src/ ./
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli && apachectl restart