--
-- Initialises the database and creates a user.
--
DROP DATABASE IF EXISTS `@db.dbname@`;
CREATE DATABASE `@db.dbname@`;
GRANT ALL ON `@db.dbname@`.* TO `@db.username@` IDENTIFIED BY '@db.password@';
