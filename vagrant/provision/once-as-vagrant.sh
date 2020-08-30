#!/usr/bin/env bash

#== Import script args ==

github_token=$(echo "$1")

#== Bash helpers ==

function info {
  echo " "
  echo "--> $1"
  echo " "
}

#== Provision script ==

info "Provision-script user: `whoami`"

# ---------------------------- Copy GitLab certificate ----------------------------
info "Copy GitLab certificate key"
# ln -s /opt/vagrant/ssh/id_rsa_gitlab ~/.ssh/id_rsa
cp /opt/vagrant/ssh/id_rsa_gitlab ~/.ssh/id_rsa
chmod 600 ~/.ssh/id_rsa
cat ~/.ssh/id_rsa
echo "Done!"
# ---------------------------- Copy GitLab certificate ----------------------------

# ---------------------------- Enabling ssh GitLab configuration  ----------------------------
info "Enabling ssh configuration"
# ln -s /opt/vagrant/ssh/config ~/.ssh/config
cp /opt/vagrant/ssh/config ~/.ssh/config
chmod 600 ~/.ssh/config
echo "Done!"

info "Configure composer"
composer config --global github-oauth.github.com ${github_token}
echo "Done!"

info "Install plugins for composer"
composer global require "fxp/composer-asset-plugin:^1.3.1" --no-progress

info "Install project dependencies"
cd /opt
sudo -s
cp /opt/vagrant/ssh/id_rsa_gitlab /home/vagrant/.ssh/
#cp /opt/vagrant/ssh/key.pub /home/vagrant/.ssh/
chmod 0600 /home/vagrant/.ssh/id_rsa_gitlab
#chmod 0600 /home/vagrant/.ssh/key.pub

eval `ssh-agent -s`
ssh-add /home/vagrant/.ssh/id_rsa_gitlab
composer --no-progress --prefer-dist install
#composer install
#exit

info "Init project"
cd /opt
/usr/bin/php init --env=Development --overwrite=y

info "Apply migrations"
cd /opt
export PGPASSWORD="vagrant"
/usr/bin/php yii migrate --interactive=0

info "Enabling colorized prompt for guest console"
sed -i "s/#force_color_prompt=yes/force_color_prompt=yes/" /home/vagrant/.bashrc
