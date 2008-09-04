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

passthru ('sudo apt-get -y install flamerobin ibwebadmin firebird2.1-examples');

}




?>


