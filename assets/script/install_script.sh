#!/bin/bash
#install apache2 
sudo apt update
sudo apt install apache2

#install mysql
sudo apt update
sudo apt install mysql-server
mysql << EOF
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
create database admin_push;
EOF

#install PHP With Threading 
sudo apt update && \
sudo apt install -y libzip-dev bison autoconf build-essential pkg-config git-core \
libltdl-dev libbz2-dev libxml2-dev libxslt1-dev libssl-dev libicu-dev \
libpspell-dev libenchant-dev libmcrypt-dev libpng-dev libjpeg8-dev \
libfreetype6-dev libmysqlclient-dev libreadline-dev libcurl4-openssl-dev
cd $HOME
wget https://github.com/php/php-src/archive/php-7.2.2.tar.gz
tar --extract --gzip --file php-7.2.2.tar.gz
cd $HOME/php-src-php-7.2.2
./buildconf --force
CONFIGURE_STRING="--prefix=/etc/php7 --with-bz2 --with-zlib --enable-zip --disable-cgi \
   --enable-soap --enable-intl --with-openssl --with-readline --with-curl \
   --enable-ftp --enable-mysqlnd --with-mysqli=mysqlnd --with-pdo-mysql=mysqlnd \
   --enable-sockets --enable-pcntl --with-pspell --with-enchant --with-gettext \
   --with-gd --enable-exif --with-jpeg-dir --with-png-dir --with-freetype-dir --with-xsl \
   --enable-bcmath --enable-mbstring --enable-calendar --enable-simplexml --enable-json \
   --enable-hash --enable-session --enable-xml --enable-wddx --enable-opcache \
   --with-pcre-regex --with-config-file-path=/etc/php7/cli \
   --with-config-file-scan-dir=/etc/php7/etc --enable-cli --enable-maintainer-zts \
   --with-tsrm-pthreads --enable-debug --enable-fpm \
   --with-fpm-user=www-data --with-fpm-group=www-data"

./configure $CONFIGURE_STRING
make && sudo make install
sudo chmod o+x /etc/php7/bin/phpize
sudo chmod o+x /etc/php7/bin/php-config
git clone https://github.com/krakjoe/pthreads.git
cd pthreads
/etc/php7/bin/phpize
./configure \
--prefix='/etc/php7' \
--with-libdir='/lib/x86_64-linux-gnu' \
--enable-pthreads=shared \
--with-php-config='/etc/php7/bin/php-config'
make && sudo make install
cd $HOME/php-src-php-7.2.2
sudo mkdir -p /etc/php7/cli/
sudo cp php.ini-production /etc/php7/cli/php.ini
echo "extension=pthreads.so" | sudo tee -a /etc/php7/cli/php.ini
echo "zend_extension=opcache.so" | sudo tee -a /etc/php7/cli/php.ini
sudo rm /usr/bin/php
sudo ln -s /etc/php7/bin/php /usr/bin/php
php --version

#install phpmyadmin
sudo apt update
sudo apt install phpmyadmin php-mbstring php-gettext
sudo cp /etc/phpmyadmin/apache.conf /etc/apache2/conf-enabled/phpmyadmin.conf

#setup github
cd /var/www/html
git clone https://github.com/navneetofficial25/push.eniacoder.com.git
cd push.eniacoder.com
echo "Checkout Multiuser Branch? [Y,n]"
read input
if [[ $input == "Y" || $input == "y" ]]; then
        git checkout remotes/origin/multiuser_push
else
        git checkout remotes/origin/push_panel_1.0
fi

#import Database
mysql -u root -ppassword admin_push < admin_push.sql

#copy move all data outside of push.eniacoder.com folder
mv * ..
cd ..
rm index.html
chmod -R 777 .

#need to chanege DB setting in two files in CI
#need to chanege base URL
#need to change Firebase configuration settings in two js files 

