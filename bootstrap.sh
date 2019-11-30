#!/usr/bin/env bash

apt-get update
apt-get install -y apache2
if ! [ -L /var/www ]; then
  rm -rf /var/www
  ln -fs /vagrant /var/www
fi
echo "apache installed"
httpd -v

apt-get install software-properties-common -y
add-apt-repository ppa:ondrej/php -y
apt-get update

apt-get install php7.3 php7.3-mbstring php7.3-curl php7.3-intl php7.3-xml php7.3-zip -y
echo "php installed"
php -v

sudo apt-get install mysql-server -y
echo "mysql installed"
mysql -V
echo "Dont forget to run mysql_secure_installation"
