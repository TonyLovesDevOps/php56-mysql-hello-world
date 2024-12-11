FROM php:5.6-apache

# https://unix.stackexchange.com/questions/744401/security-repo-for-debian-stretch-not-working-anymore
# Replace URL to repos and delete stretch-updates repo which was not archived
RUN sed -i 's/security.debian.org/archive.debian.org/g' /etc/apt/sources.list && \
    sed -i 's/deb.debian.org/archive.debian.org/g' /etc/apt/sources.list && \
    sed -i '/stretch-updates/d' /etc/apt/sources.list

RUN apt update -y \
&& apt upgrade -q -y \
&& DEBIAN_FRONTEND=noninteractive apt install -y \
mysql-client \
default-libmysqlclient-dev

RUN docker-php-ext-configure mysql --with-mysql=/usr/ \
&& docker-php-ext-install -j$(nproc) mysql opcache \
&& docker-php-ext-configure mysqli --with-mysqli=/usr/bin/mysql_config \
&& docker-php-ext-install -j$(nproc) mysqli

RUN a2enmod rewrite
