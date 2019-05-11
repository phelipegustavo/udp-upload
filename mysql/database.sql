create database udp;

use udp;

create table uploads (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    type VARCHAR(30),
    mime VARCHAR(30),
    name VARCHAR(255),
    hash VARCHAR(255)
);