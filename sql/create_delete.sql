CREATE DATABASE chat;

CREATE TABLE chat_users(
    userid INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,  
    email VARCHAR(80) NOT NULL,
    passwd TEXT NOT NULL,
    PRIMARY KEY (userid)
);

CREATE TABLE chat_msg(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,  
    message TEXT NOT NULL,
    msgtime TIMESTAMP,
    PRIMARY KEY (id)
);

DROP TABLE chat_msg;

DROP TABLE chat_users;

DROP DATABASE chat;