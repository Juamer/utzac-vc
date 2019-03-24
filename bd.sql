CREATE DATABASE utzac_vc DEFAULT CHARACTER SET utf8;
CREATE USER utzac_vc_admin@localhost IDENTIFIED BY "youletmeknow";
GRANT ALL ON utzac_vc.* TO utzac_vc_admin@localhost IDENTIFIED BY "youletmeknow";