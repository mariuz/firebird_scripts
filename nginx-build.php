#!/usr/bin/php
<?

$fp = fopen('/usr/bin/php-fastcgi','w');
fwrite($fp,"#!/bin/sh\n");
fwrite($fp,"/usr/bin/spawn-fcgi -a 127.0.0.1 -p 9000 -u www-data -f /usr/bin/php5-cgi\n");
fclose($fp);

passthru("sudo chmod +x /usr/bin/php-fastcgi");
passthru("cp nginx/init-fastcgi /etc/init.d");
passthru("chmod 755 /etc/init.d/init-fastcgi");
passthru("update-rc.d init-fastcgi defaults");





passthru("sudo apt-get install  php5-cli php5-cgi build-essential libpcre3 libpcre3-dev libpcrecpp0 libssl-dev zlib1g-dev"); 
passthru("mkdir -p /opt/build/nginx");
chdir("/opt/build/nginx");
passthru("wget --continue  http://sysoev.ru/nginx/nginx-0.6.32.tar.gz");
passthru("tar -zxvf nginx-0.6.32.tar.gz");
chdir("nginx-0.6.32");
passthru("./configure --prefix=/opt/nginx --with-http_flv_module");
passthru("make");
passthru("sudo make install");


passthru("wget --continue  wget http://www.lighttpd.net/download/lighttpd-1.4.19.tar.gz");
passthru("tar -zxvf lighttpd-1.4.19.tar.gz");
chdir("lighttpd-1.4.19.tar.gz");
passthru("./configure");
passthru("make");
passthru("sudo cp src/spawn-fcgi /usr/bin/spawn-fcgi");
passthru("/etc/init.d/init-fastcgi start");


?>
