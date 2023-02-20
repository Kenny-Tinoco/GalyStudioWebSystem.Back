FROM php:8.2.2-fpm

ARG UID

RUN adduser -u ${UID} --disabled-password --gecos "" appuser
RUN mkdir /home/appuser/.ssh
RUN chown -R appuser:appuser /home/appuser/
RUN echo "StrictHostKeyChecking no" >> /home/appuser/.ssh/config
RUN echo "export COLUMNS=300" >> /home/appuser/.bashrc
RUN echo "alias sf=/appdata/www/bin/console" >> /home/appuser/.bashrc

COPY ./php.ini /usr/local/etc/php/php.ini

RUN apt update
RUN apt install -y git acl openssl openssh-client wget zip vim libssh-dev
RUN apt install -y libpng-dev zlib1g-dev libzip-dev libxml2-dev libicu-dev
RUN docker-php-ext-install intl pdo pdo_mysql zip gd soap bcmath sockets && pecl install xdebug
RUN docker-php-ext-enable --ini-name 05-opcache.ini opcache xdebug

RUN curl https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer
RUN composer self-update

RUN mkdir -p /appdata/www

COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /appdata/www
