#!/usr/bin/php
<?


//Firetube application 
chdir("/opt/nginx/html");
passthru("git clone git://github.com/mariuz/firetube.git");
passthru("chown -R www-data.www-data /opt/nginx");

?>
