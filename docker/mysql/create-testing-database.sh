#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS gestion;
    GRANT ALL PRIVILEGES ON \`gestion%\`.* TO '$MYSQL_USER'@'%';
EOSQL
