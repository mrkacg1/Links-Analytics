FROM php:8.0.2-apache
RUN apt-get update -y && apt-get install -y curl && apt-get clean -y
RUN apt-get install -y vim nano
RUN apt-get update && apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*
RUN mkdir -p /usr/src/php/ext/imagick; \
    curl -fsSL https://github.com/Imagick/imagick/archive/06116aa24b76edaf6b1693198f79e6c295eda8a9.tar.gz | tar xvz -C "/usr/src/php/ext/imagick" --strip 1; \
    docker-php-ext-install imagick;
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install gd
RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev 
COPY 000-default.conf /etc/apache2/sites-available
RUN a2enmod rewrite
RUN service apache2 restart
EXPOSE 80