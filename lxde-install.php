#!/usr/bin/php
<?php
/*
Minimal desktop for livecd or virtual machine 

install first from jeos for example and then this script it will 

install the rest xorg , lxde and gdm 

*/

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


//requirments apt-get install php5-cli and git-core before using this script :)


if (($OperatingSystem == "Ubuntu") && ($Version =="8.04"))

{

$fp = fopen('/etc/apt/sources.list.d/lxde.list','w');

fwrite($fp,"deb http://ppa.launchpad.net/lxde/ubuntu hardy main\n");
fwrite($fp,"deb-src http://ppa.launchpad.net/lxde/ubuntu hardy main\n");
fclose($fp);

passthru ('sudo apt-get -y update');
passthru ('sudo apt-get -y install xorg');
passthru ('sudo apt-get -y --force-yes install lxde gdm ubuntu-gdm-themes');
passthru ('sudo /etc/init.d/gdm start');
// install other mini windowmanagers - they are small anyway fluxbox blackbox jwm 
#install xfce 
passthru ('sudo apt-get -y install  xfce4 xfce4-terminal midori');


}




?>


