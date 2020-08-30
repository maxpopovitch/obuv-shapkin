#!/usr/bin/env bash

#== Bash helpers ==

function info {
  echo " "
  echo "--> $1"
  echo " "
}

#== Provision script ==

info "Provision-script user: `whoami`"

sudo mkdir /var/log/core
sudo chown -R vagrant:vagrant /var/log/core

info "Restart web-stack"
service php7.1-fpm restart
#service php7.2-fpm restart
service nginx restart
service postgresql restart

sudo /usr/bin/php -f /opt/yii cron/index
