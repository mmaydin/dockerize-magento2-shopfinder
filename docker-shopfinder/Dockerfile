#Download base image ubuntu 16.04
FROM ubuntu:16.04
 
# Update Software repository
RUN apt-get update
 
# Install nginx, php-fpm and supervisord from ubuntu repository
RUN apt-get install -y \
        nginx \
        php7.0-fpm \
        php7.0-mcrypt \
        php7.0-curl \
        php7.0-cli \
        php7.0-mysql \
        php7.0-gd \
        php7.0-xsl \
        php7.0-json \
        php7.0-intl \
        php-pear \
        php7.0-dev \
        php7.0-common \
        php7.0-mbstring \
        php7.0-zip \
        php-soap \
        libcurl3 \
        curl \
        supervisor

# Install mysql
RUN { \
        echo debconf debconf/frontend select Noninteractive; \
        echo mysql-community-server mysql-community-server/data-dir \
            select ''; \
        echo mysql-community-server mysql-community-server/root-pass \
            password ''; \
        echo mysql-community-server mysql-community-server/re-root-pass \
            password ''; \
        echo mysql-community-server mysql-community-server/remove-test-db \
            select true; \
    } | debconf-set-selections \
    && apt-get install -y mysql-server mysql-client && rm -rf /var/lib/apt/lists/*

ADD ./conf/bind_0.cnf /etc/mysql/conf.d/bind_0.cnf

RUN mkdir -p /opt/mysql
ADD ./bin/run-mysql.sh /opt/mysql/run-mysql.sh
RUN chmod 755 /opt/mysql/run-mysql.sh

# install composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    printf "\nPATH=\"~/.composer/vendor/bin:\$PATH\"\n" | tee -a ~/.bashrc

ADD ./conf/auth.json /root/.composer/auth.json

#Define the ENV variable
ENV supervisor_conf /etc/supervisor/supervisord.conf
 
# Enable php-fpm on nginx virtualhost configuration
COPY ./conf/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./conf/nginx/default.conf /etc/nginx/sites-available/default
COPY ./conf/php-fpm/php.ini /etc/php/7.0/fpm/php.ini
COPY ./conf/php-fpm/www.conf /etc/php/7.0/fpm/pool.d/www.conf

# Copy supervisor configuration
COPY ./conf/supervisord.conf ${supervisor_conf}
 
RUN mkdir -p /run/php && \
    chown -R www-data:www-data /var/www/html && \
    chown -R www-data:www-data /run/php

# Add Shopfinder module
COPY ./shopfinder /shopfinder

# Configure Services and Port
COPY ./bin/start.sh /start.sh
COPY ./bin/magento2-start.sh /usr/local/bin/magento2-start.sh
COPY ./sql/mysql-init.sql /mysql-init.sql

RUN rm -rf /var/lib/mysql && mkdir -p /var/lib/mysql /var/run/mysqld
RUN chown -R mysql:mysql /var/lib/mysql /var/run/mysqld
RUN chmod 777 /var/run/mysqld

# Volume configuration
VOLUME ["/var/lib/mysql", "/var/www/html"]

EXPOSE 80

CMD ["./start.sh"]
