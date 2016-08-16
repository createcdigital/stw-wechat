 -- create user
 GRANT USAGE ON *.* TO 'stw'@'localhost' IDENTIFIED BY 'f3@hV%WViq0YUa0jfx' WITH GRANT OPTION;
 -- create database
 CREATE DATABASE stw  CHARACTER SET  utf8  COLLATE utf8_general_ci;
 -- grant user 权限1,权限2select,insert,update,delete,create,drop,index,alter,grant,references,reload,shutdown,process,file等14个权限
 GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP,LOCK TABLES,index,alter ON stw.*  TO 'stw'@'localhost' IDENTIFIED BY 'f3@hV%WViq0YUa0jfx';

 -- mysqldump -ustw -pf3@hV%WViq0YUa0jfx stw > /var/tmp/mysqlbackup/mysqlbak_stw_201608111839.sql