#!/usr/bin/php
<?php

$OperatingSystem="Ubuntu";
$Version="8.04";
define("BUILDDIR","/opt/build/");

function Configure()
{
passthru ('./configure --prefix=/usr');
}

function Make($args)
{
passthru ('make'.' '.$args);
}

function ConfigureMakeInstall()
{
Configure();
Make('install');

echo getcwd() . "\n";
chdir (BUILDDIR);
} 


//requirments apt-get install php5-cli before using this script :)


if (($OperatingSystem == "Ubuntu") && ($Version =="8.04"))

{
passthru ('sudo apt-get -y install php5-dev');


chdir (BUILDDIR);

#Needed for extension after php5-dev is installed
#http://ffmpeg-php.sourceforge.net/
#12.Get ffmpeg-php

passthru (' wget http://dfn.dl.sourceforge.net/sourceforge/ffmpeg-php/ffmpeg-php-0.5.3.1.tbz2');
passthru ('tar -jxf ffmpeg-php-0.5.3.1.tbz2');
chdir ('ffmpeg-php-0.5.3.1');
passthru ('phpize');
passthru ('./configure');
Make('install');
chdir (BUILDDIR);


$fp = fopen('/etc/php5/conf.d/ffmpeg.ini','w');
fwrite($fp,"extension=ffmpeg.so\n");
fclose($fp);

passthru ('php -r \'phpinfo();\' | grep ffmpeg'); 

#retart fast-cgi to pick ffmpeg extension
passthru("sudo /etc/init.d/init-fastcgi restart");





}




?>


