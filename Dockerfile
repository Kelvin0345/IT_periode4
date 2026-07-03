# Gebruik het officiële PHP image met Apache voorgeïnstalleerd
FROM php:8.4-apache

# Installeer de benodigde PHP-extensies voor MySQL (PDO)
RUN docker-php-ext-install pdo pdo_mysql

# Kopieer de 'app' map naar /var/www/app (veilig buiten de webmap)
COPY app/ /var/www/app/

# Kopieer de inhoud van 'public' DIRECT naar de Apache webmap (/var/www/html)
COPY public/ /var/www/html/

# Documenteer dat de container intern op poort 80 luistert
EXPOSE 80