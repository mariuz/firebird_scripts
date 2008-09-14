#!/usr/bin/php
<?
#This Builds the latest firebird from head
passthru("sudo apt-get install automake libtool libreadline5-dev make btyacc bison gawk g++ wget cvs"); 
passthru("mkdir -p /opt/build/firebird3.x");
chdir("/opt/build/firebird3.x");
passthru("cvs -d:pserver:anonymous@firebird.cvs.sourceforge.net:/cvsroot/firebird login");
passthru("cvs -z3 -d:pserver:anonymous@firebird.cvs.sourceforge.net:/cvsroot/firebird co firebird2");
chdir("firebird2");
passthru("./autogen.sh --prefix=/opt/firebird3.x --enable-superserver");
passthru("make");
passthru("sudo make install");
?>
