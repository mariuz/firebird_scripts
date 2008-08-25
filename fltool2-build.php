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


#Get flvtool2
       

chdir (BUILDDIR);
passthru ('sudo wget --continue http://rubyforge.org/frs/download.php/17497/flvtool2-1.0.6.tgz');

passthru ('tar -zxf flvtool2-1.0.6.tgz');

chdir ('flvtool2-1.0.6');

passthru ('ruby setup.rb config');
passthru ('ruby setup.rb setup');
passthru ('ruby setup.rb install');

chdir (BUILDDIR);

}




?>


