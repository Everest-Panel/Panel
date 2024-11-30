#!/bin/bash

trap stop_processes TERM

function stop_processes() {
    echo "Stopping Softwares..."
    pkill -15 nginx
    pkill -15 php-fpm8.2
    exit 1
}
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

php-fpm8.2
nginx

while [ true ]; do
    sleep 1
done

# tail -f /var/log/php8.2-fpm.log /var/log/nginx/error.log /var/log/nginx/access.log