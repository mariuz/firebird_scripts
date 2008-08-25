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
// see this page also https://wiki.ubuntu.com/ffmpeg


if (($OperatingSystem == "Ubuntu") && ($Version =="8.04"))

{


#Install mplayer from source - we need mencoder for our class       

chdir (BUILDDIR);
passthru ('sudo wget --continue http://www2.mplayerhq.hu/MPlayer/releases/MPlayer-1.0rc2.tar.bz2');
passthru ('sudo wget --continue http://www2.mplayerhq.hu/MPlayer/releases/codecs/essential-20061022.tar.bz2');

passthru ('tar -jxf essential-20061022.tar.bz2');
passthru ('tar -jxf MPlayer-1.0rc2.tar.bz2');

passthru ('essential-20061022 codecs');
passthru ('mv codecs /usr/lib/');

chdir ('MPlayer-1.0rc2/');
ConfigureMakeInstall();
}




?>


