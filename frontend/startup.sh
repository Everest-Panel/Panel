#!/bin/bash

CDate=$(date +"%Y_%m_%d_%H_%M_%S");

if [ ! -f /app/installed ]; then
    7z a /backup_$CDate.7z /app
    rm -r /app
    cp -r /frontend/* /app
    chmod -R 0777 /app
    chown -R www-data:www-data /app
    mv /backup_$CDate.7z /app
    touch /app/installed
fi

nginx
php-fpm8.2

tail -f /var/log/php8.2-fpm.log /var/log/nginx/error.log /var/log/nginx/access.log

if [ ! -n "$HANG" ]; then
    HANG=0;
fi

while [ $HANG == 1 ]; do
    sleep 1;
done