#!/usr/bin/php
<?php
/*
Minimal desktop for livecd or virtual machine 
install first from jeos/minimal cd for example and then this script it will 
install the rest xorg , lxde and gdm 

*/

passthru ('sudo apt-get -y install xorg');
passthru ('sudo apt-get -y --force-yes install lxde gdm ubuntu-gdm-themes');
passthru ('sudo /etc/init.d/gdm start');
passthru ('sudo apt-get -y install xfce4-terminal chromium-browser');
?>


