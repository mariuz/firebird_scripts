#!/usr/bin/php
<?
passthru("sudo apt-get install apt-get install php5-cli php5-cgi build-essential libpcre3 libpcre3-dev libpcrecpp0 libssl-dev zlib1g-dev"); 
passthru("mkdir -p /opt/build/nginx");
chdir("/opt/build/nginx");
passthru("wget --continue  http://sysoev.ru/nginx/nginx-0.6.32.tar.gz");
passthru("tar -zxvf nginx-0.6.32.tar.gz");
chdir("nginx-0.7.11");
passthru("./configure --prefix=/opt/nginx --with-http_flv_module");
passthru("make");
passthru("sudo make install");
?>
