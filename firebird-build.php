#!/usr/bin/php
<?
passthru("sudo apt-get install automake libtool libreadline5-dev make btyacc bison gawk g++ wget"); 
passthru("mkdir -p /opt/build");
chdir("/opt/build");
passthru("wget http://downloads.sourceforge.net/firebird/Firebird-2.5.0.20343-Alpha1.tar.bz2");
passthru("tar -jxvf Firebird-2.5.0.20343-Alpha1.tar.bz2");
chdir("Firebird-2.5.0.20343-Alpha1");
passthru("./autogen.sh --prefix=/opt/firebird2.5.x --enable-super-server");
passthru("make");
passthru("sudo make install");
?>
