#!/bin/sh
chmod 777 /www/runtime
chmod 777 /www/public/assets
echo "--> [$0] APPLICATION_ENV=$APPLICATION_ENV"

if [ -z $APPLICATION_ENV ]
then
  echo "!! You must set the APPLICATION_ENV env var"
  exit 1
fi
/etc/init.d/nginx start \
  && php-fpm
