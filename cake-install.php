#!/usr/bin/php
<?
$cake_version="1.2.0.7962";
// Clean cake php 
chdir("/opt/build/");
passthru("wget http://cakeforge.org/frs/download.php/694/$cake_version.tar.bz2/donation=complete -O cake-$cake_version.tar.bz2");
passthru("tar -jxvf cake-$cake_version.tar.bz2");
passthru("chown -R www-data.www-data cake_$cake_version");
passthru("mv cake_$cake_version /opt/nginx/html/firetube ");
?>
