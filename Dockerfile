FROM adilsoncarvalho/php-docker

RUN mkdir /var/log/php-fpm

ENV APPLICATION_ENV Production

COPY .docker/php/php-fpm.conf /usr/local/etc/php-fpm.conf

# NGINX
RUN rm -rf /etc/nginx/sites-enabled/* /etc/nginx/sites-available/*
COPY .docker/nginx/conf.d/* /etc/nginx/sites-available/
RUN ln -s /etc/nginx/sites-available/advanced.conf /etc/nginx/sites-enabled/advanced.conf

WORKDIR /www
COPY . /www
COPY .docker/build.sh .

RUN ./build.sh

CMD ["./start.sh"]
