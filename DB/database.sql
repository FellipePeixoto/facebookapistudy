CREATE DATABASE TETROYSDB;

USE TETROYSDB;

CREATE TABLE PLAYER(
    id_player int primary key,
    userId varchar(150) not null UNIQUE,
    nickName varchar(50),
    playerScore int
);

CREATE VIEW PLAYER_HIGH_SCORES AS 
SELECT nickName, playerScore FROM
PLAYER ORDER BY playerScore;