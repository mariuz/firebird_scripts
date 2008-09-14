#!/usr/bin/php
<?
$FirebirdVersion="Firebird-2.5.0.20343-Alpha1";
passthru("sudo apt-get install automake libtool libreadline5-dev make btyacc bison gawk g++ wget"); 
passthru("mkdir -p /opt/build");
chdir("/opt/build");
passthru("wget --continue  http://downloads.sourceforge.net/firebird/$FirebirdVersion.tar.bz2");
passthru("tar -jxvf $FirebirdVersion.tar.bz2");
chdir("$FirebirdVersion");
passthru("./autogen.sh --prefix=/opt/firebird2.5.x --enable-superserver");
passthru("make");
passthru("sudo make install");
?>
