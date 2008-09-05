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

passthru ('sudo apt-get -y --force-yes install flamerobin ibwebadmin firebird2.1-examples');

#enable php firebird extension
$fp = fopen('/etc/php5/apache2/conf.d/firebird.ini','w');
fwrite($fp,"extension = interbase.so\n");
fclose($fp);

chdir("/usr/share/doc/firebird2.1-examples/examples/empbuild/");
passthru ('sudo gunzip employee.fdb.gz');
passthru ('sudo chown firebird.firebird employee.fdb employee.fdb');
passthru ('sudo mv employee.fdb /var/lib/firebird/2.1/data/');

#Add yourself to the firebird and www-data group

passthru ('sudo adduser \`id -un\` firebird');
passthru ('sudo adduser \`id -un\` www-data');


passthru ('sudo /etc/init.d/apache2 restart');


}




?>


