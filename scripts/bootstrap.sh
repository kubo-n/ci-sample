#!/bin/sh
## yum update
yum -y update

## git
yum -y install git

## zip
yum -y install zip unzip

## Apache install
yum -y install httpd
cp /vagrant/httpd/conf/httpd.conf /etc/httpd/conf/
service httpd start
chkconfig httpd on

## Repository install
yum -y install epel-release
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm

## PHP7 install
yum -y install --enablerepo=remi,remi-php70 php php-devel php-mbstring php-pdo php-gd php-mysqlnd php-mcrypt php-xml

## Composer install
curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

## MySQL install
yum -y install http://dev.mysql.com/get/mysql-community-release-el6-5.noarch.rpm
yum -y install mysql-community-server
service mysqld start
chkconfig mysqld on

## DB setup
echo "DROP DATABASE IF EXISTS develop;" | mysql -u root
echo "CREATE DATABASE develop;" | mysql -u root

## apache restart
service httpd restart