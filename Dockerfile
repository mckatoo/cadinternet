FROM ubuntu:16.04
RUN apt-get update && apt-get install -y \
        nginx \
        php \
        php-mysql \
        php-mbstring \
        php-mcrypt \
        nodejs \
        git \
        npm \
        php-dom \
        php-pear \
        php-curl \
        sudo \
        vim \
        wget \
    && bash -c "ln -s /usr/bin/nodejs /usr/bin/node" \
    && npm install -g bower \
    && npm install -g gulp \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && bash -c "chmod +x composer.phar" \
    && bash -c "mv composer.phar /usr/local/bin/composer" \
    && bash -c "echo 'mckatoo	ALL=(ALL:ALL) NOPASSWD:ALL' > /etc/sudoers.d/mckatoo" \
    && service nginx start \
    && service php7.0-fpm start
