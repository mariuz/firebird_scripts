#!/usr/bin/php
<?
DEFINE(NGINX_VERSION,'nginx-1.0.6');

passthru("chmod +x /usr/bin/php-fastcgi");
passthru("mkdir -p /opt/nginx/conf");
passthru("cp nginx/init-fastcgi /etc/init.d");
passthru("cp nginx/nginx /etc/init.d");
passthru("cp nginx/nginx.conf /opt/nginx/conf");
passthru("chmod 755 /etc/init.d/init-fastcgi");
passthru("chmod 755 /etc/init.d/nginx");
passthru("update-rc.d init-fastcgi defaults");
passthru("update-rc.d nginx defaults");



passthru("apt-get install -y php5-cli php5-cgi build-essential libpcre3 libpcre3-dev libpcrecpp0 libssl-dev zlib1g-dev wget apt-get install php5-fpm"); 
passthru("mkdir -p /opt/build/nginx");
chdir("/opt/build/nginx");
passthru("wget --continue  http://nginx.org/download/".NGINX_VERSION.".tar.gz");
passthru("tar -zxf ".NGINX_VERSION.".tar.gz");
chdir(NGINX_VERSION);
passthru("./configure --prefix=/opt/nginx");
passthru("make");
passthru("make install");

passthru("/etc/init.d/nginx start");
?>
