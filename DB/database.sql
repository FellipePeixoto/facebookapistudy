CREATE DATABASE TETROYSDB;

USE TETROYSDB;

CREATE TABLE PLAYER(
    id_player int primary key,
    userId varchar(150) not null UNIQUE,
    nickName varchar(50),
    playerScore int default 0
);

CREATE VIEW PLAYER_TOP4 AS 
SELECT userId, nickName, playerScore FROM
PLAYER ORDER BY playerScore DESC LIMIT 4;