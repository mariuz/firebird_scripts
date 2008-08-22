#!/usr/bin/php
<?

// Clean cake php 
chdir("/opt/build/");
passthru("wget --continue  http://cakeforge.org/frs/download.php/637/cake_1.2.0.7296-rc2.tar.bz2/donation=complete");
passthru("mv donation\=complete cake_1.2.0.7296-rc2.tar.bz2 ; tar -jxvf cake_1.2.0.7296-rc2.tar.bz2");
passthru("chown -R www-data.www-data cake_1.2.0.7296-rc2");
passthru("mv cake_1.2.0.7296-rc2 /opt/nginx/html/firetube ");
?>
