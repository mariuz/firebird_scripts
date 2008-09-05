#!/usr/bin/php



<?

$fp = fopen('/etc/apt/sources.list.d/firebird.list','w');
fwrite($fp,"deb http://ppa.launchpad.net/mapopa/ubuntu hardy main\n");
fwrite($fp,"deb-src http://ppa.launchpad.net/mapopa/ubuntu hardy main\n");
fclose($fp);

passthru("sudo apt-get update"); 
passthru("sudo apt-get -y --force-yes install firebird2.1-super php5-interbase");
passthru("sudo sudo dpkg-reconfigure firebird2.1-super");


#restart fast-cgi to pick interbase extension
passthru("sudo /etc/init.d/init-fastcgi restart");
?>
