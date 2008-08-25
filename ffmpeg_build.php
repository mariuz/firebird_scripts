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
passthru ('sudo apt-get -y install ruby subversion gcc git-core automake unzip libogg-dev libvorbis-dev wget  ');
passthru ('sudo apt-get -y build-dep ffmpeg');
passthru ('sudo apt-get -y install liblame-dev libfaad-dev libfaac-dev libxvidcore4-dev liba52-0.7.4 liba52-0.7.4-dev libdts-dev checkinstall liba52-dev libdts-dev libgsm1-dev libvorbis-dev libdc1394-dev libfaad-dev libtheora-dev libsdl1.2-dev ');
passthru ('sudo apt-get -y remove libx264-dev libx264');


#From http://www.penguin.cz/~utx/amr download amrnb-7.0.0.2.tar.bz2 and amrwb-7.0.0.3.tar.bz2       

chdir (BUILDDIR);
passthru ('sudo wget --continue http://ftp.penguin.cz/pub/users/utx/amr/amrnb-7.0.0.2.tar.bz2');
passthru ('tar -jxvf amrnb-7.0.0.2.tar.bz2');
chdir ('amrnb-7.0.0.2');
ConfigureMakeInstall();

passthru ('sudo wget --continue http://ftp.penguin.cz/pub/users/utx/amr/amrwb-7.0.0.3.tar.bz2');
passthru ('sudo tar -jxvf amrwb-7.0.0.3.tar.bz2');
chdir ('amrwb-7.0.0.3');
ConfigureMakeInstall();


#10.GEt x264 from here  http://www.videolan.org/developers/x264.html


passthru ('git clone git://git.videolan.org/x264.git');
chdir ('x264');
passthru ('./configure --prefix=/usr --disable-asm --enable-pic ;make ;make install');
chdir (BUILDDIR);



#Finally ffmpeg from svn trunk 

passthru ('svn checkout svn://svn.mplayerhq.hu/ffmpeg/trunk ffmpeg');
passthru ('cd ffmpeg;./configure --prefix=/usr --enable-libamr-nb --enable-libamr-wb --enable-libvorbis --enable-libxvid --enable-liba52 --enable-libmp3lame --enable-libx264 --enable-libtheora --enable-libfaad --enable-gpl --enable-shared --enable-pthreads --enable-libfaac --enable-nonfree --enable-postproc;make ; make install'); 
chdir (BUILDDIR);




}




?>


