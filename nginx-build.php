#!/usr/bin/php
<?

$fp = fopen('/usr/bin/php-fastcgi','w');
fwrite($fp,"#!/bin/sh\n");
fwrite($fp,"/usr/bin/spawn-fcgi -a 127.0.0.1 -p 9000 -u www-data -f /usr/bin/php5-cgi\n");
fclose($fp);

passthru("sudo chmod +x /usr/bin/php-fastcgi");
passthru("mkdir -p /opt/nginx/conf");
passthru("sudo cp nginx/init-fastcgi /etc/init.d");
passthru("sudo cp nginx/nginx /etc/init.d");
passthru("sudo cp nginx/nginx.conf /opt/nginx/conf");
passthru("sudo chmod 755 /etc/init.d/init-fastcgi");
passthru("sudo chmod 755 /etc/init.d/nginx");
passthru("sudo update-rc.d init-fastcgi defaults");
passthru("sudo update-rc.d nginx defaults");






passthru("sudo apt-get install  php5-cli php5-cgi build-essential libpcre3 libpcre3-dev libpcrecpp0 libssl-dev zlib1g-dev"); 
passthru("mkdir -p /opt/build/nginx");
chdir("/opt/build/nginx");
passthru("wget --continue  http://sysoev.ru/nginx/nginx-0.6.32.tar.gz");
passthru("tar -zxvf nginx-0.6.32.tar.gz");
chdir("nginx-0.6.32");
passthru("./configure --prefix=/opt/nginx --with-http_flv_module");
passthru("make");
passthru("sudo make install");

chdir("/opt/build/");
passthru("wget --continue  wget http://www.lighttpd.net/download/lighttpd-1.4.19.tar.gz");
passthru("tar -zxvf lighttpd-1.4.19.tar.gz");
chdir("lighttpd-1.4.19");
passthru("./configure --without-bzip2");
passthru("make");
passthru("sudo cp src/spawn-fcgi /usr/bin/spawn-fcgi");
passthru("/etc/init.d/init-fastcgi start");
passthru("chown -R www-data.www-data /opt/nginx");
passthru("/etc/init.d/nginx start");


#passthru("git clone git://github.com/mariuz/firetube.git");
#chdir("/opt/nginx/html");


?>
