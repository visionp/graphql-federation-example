FROM phpdockerio/php:8.2-fpm
WORKDIR /var/www

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php8.2-msgpack php8.2-igbinary php8.2-ldap \
    php8.2-xdebug \
	apt-utils iputils-ping \
	ssh dnsutils

RUN ln -s /usr/bin/php /usr/local/bin/php

#cleaning
RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

