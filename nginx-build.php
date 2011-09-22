#!/usr/bin/php
<?
DEFINE(NGINX_VERSION,'nginx-1.0.6');
DEFINE(SPAWN_FCGI_VERSION,'spawn-fcgi-1.6.3');

$fp = fopen('/usr/bin/php-fastcgi','w');
fwrite($fp,"#!/bin/sh\n");
fwrite($fp,"PHP_FCGI_CHILDREN=10\n");
fwrite($fp,"PHP_FCGI_MAX_REQUESTS=1000\n");
fwrite($fp,"/usr/bin/spawn-fcgi -C 10 -F 10 -a 127.0.0.1 -p 9000 -u www-data -f /usr/bin/php5-cgi\n");
fclose($fp);

passthru("chmod +x /usr/bin/php-fastcgi");
passthru("mkdir -p /opt/nginx/conf");
passthru("cp nginx/init-fastcgi /etc/init.d");
passthru("cp nginx/nginx /etc/init.d");
passthru("cp nginx/nginx.conf /opt/nginx/conf");
passthru("chmod 755 /etc/init.d/init-fastcgi");
passthru("chmod 755 /etc/init.d/nginx");
passthru("update-rc.d init-fastcgi defaults");
passthru("update-rc.d nginx defaults");



passthru("apt-get install -y php5-cli php5-cgi build-essential libpcre3 libpcre3-dev libpcrecpp0 libssl-dev zlib1g-dev wget"); 
passthru("mkdir -p /opt/build/nginx");
chdir("/opt/build/nginx");
passthru("wget --continue  http://sysoev.ru/nginx/".NGINX_VERSION.".tar.gz");
passthru("tar -zxf ".NGINX_VERSION.".tar.gz");
chdir(NGINX_VERSION);
passthru("./configure --prefix=/opt/nginx --with-http_flv_module");
passthru("make");
passthru("make install");

chdir("/opt/build/");
passthru("wget --continue http://www.lighttpd.net/download/".SPAWN_FCGI_VERSION.".tar.gz");
passthru("tar -zxf ".SPAWN_FCGI_VERSION.".tar.gz");
chdir(SPAWN_FCGI_VERSION);

passthru("./configure");
passthru("make");
passthru("cp src/spawn-fcgi /usr/bin/spawn-fcgi");
passthru("/etc/init.d/init-fastcgi start");
passthru("chown -R www-data.www-data /opt/nginx");
passthru("/etc/init.d/nginx start");


#passthru("git clone git://github.com/mariuz/firetube.git");
#chdir("/opt/nginx/html");


?>
