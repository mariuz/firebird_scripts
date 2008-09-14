isql-fb -u sysdba -p masterkey
CREATE DATABASE "/var/lib/firebird/2.1/data/firetube.fdb";
commit ;
quit;
isql-fb -u sysdba -p masterkey -i /opt/nginx/html/firetube/app/config/sql/firetube.sql 

