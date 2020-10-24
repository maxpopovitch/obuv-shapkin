#!/usr/bin/env bash

#== Import script args ==

timezone=$(echo "$1")

#== Bash helpers ==

function info {
  echo " "
  echo "--> $1"
  echo " "
}

#== Provision script ==

info "Provision-script user: `whoami`"

export DEBIAN_FRONTEND=noninteractive

info "Configure timezone"
timedatectl set-timezone ${timezone} --no-ask-password


info "Update OS software"
add-apt-repository ppa:ondrej/php
apt-get update
apt-get upgrade -y


info "Install additional software"
apt-get install -y php7.1-curl php7.1-cli php7.1-intl php7.1-bcmath php7.1-soap php7.1-gd php7.1-fpm php7.1-zip php7.1-apcu php7.1-sqlite php7.1-ldap php7.1-xml php7.1-pgsql php7.1-mysqlnd php7.1-mbstring php7.1-xdebug php7.1-zip unzip nginx mysql-server-5.7 rabbitmq-server redis-server supervisor nodejs-legacy npm mc
#apt-get install -y php7.2-curl php7.2-cli php7.2-intl php7.2-bcmath php7.2-soap php7.2-gd php7.2-fpm php7.2-zip php7.2-apcu php7.2-sqlite3 php7.2-ldap php7.2-xml php7.2-pgsql php7.2-mysql php7.2-mbstring php-xdebug php7.2-zip unzip nginx mysql-server-5.7 rabbitmq-server redis-server supervisor nodejs-legacy npm


info "Configure PHP-FPM"
sed -i 's/user = www-data/user = vagrant/g' /etc/php/7.1/fpm/pool.d/www.conf
sed -i 's/group = www-data/group = vagrant/g' /etc/php/7.1/fpm/pool.d/www.conf
sed -i 's/owner = www-data/owner = vagrant/g' /etc/php/7.1/fpm/pool.d/www.conf
echo "Done!"
#info "Configure PHP-FPM"
#sed -i 's/user = www-data/user = vagrant/g' /etc/php/7.2/fpm/pool.d/www.conf
#sed -i 's/group = www-data/group = vagrant/g' /etc/php/7.2/fpm/pool.d/www.conf
#sed -i 's/owner = www-data/owner = vagrant/g' /etc/php/7.2/fpm/pool.d/www.conf
#echo "Done!"



# ---------------------------- Install PostgreSQL ----------------------------
info "Install PostgreSQL"
sudo sh -c "echo 'deb http://apt.postgresql.org/pub/repos/apt/ trusty-pgdg main' >> /etc/apt/sources.list.d/pgdg.list"
wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | sudo apt-key add -
sudo apt-get update
sudo apt-get install -y postgresql-9.6

info "Configure PostgreSQL"
cat >> /etc/postgresql/9.6/main/pg_hba.conf <<EOF
  # Accept all IPv4 connections - FOR DEVELOPMENT ONLY!!!
  host    all         all         0.0.0.0/0             md5
EOF

systemctl status postgresql
systemctl start postgresql
systemctl enable postgresql

info "Create Role and login"
sudo su postgres -c "psql -c \"CREATE ROLE vagrant SUPERUSER LOGIN PASSWORD 'vagrant'\" "
echo "Done!"

info "Initailize databases for PostgreSQL"
sudo su postgres -c "createdb -E UTF8 -T template0 --locale=en_US.utf8 -O vagrant obuv"
echo "Done!"

info "Initailize pgcrypto extension for PostgreSQL"
sudo su postgres -c "psql -d obuv -c \"CREATE EXTENSION pgcrypto;\""
echo "Done!"
# ---------------------------- Install PostgreSQL ----------------------------


info "Configure NGINX"
sed -i 's/user www-data/user vagrant/g' /etc/nginx/nginx.conf
echo "Done!"

info "Enabling site configuration"
ln -s /opt/vagrant/nginx/app.conf /etc/nginx/sites-enabled/app.conf
echo "Done!"

info "Install composer"
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
composer global require "fxp/composer-asset-plugin:^1.2.0"

info "Install memcached"
sudo apt-get install memcached -y
sudo apt-get install php-memcached -y
