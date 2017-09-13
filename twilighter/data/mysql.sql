create database if not exists myweb;
use myweb;

drop table if exists web_admin;
create table web_admin(
	adminid tinyint unsigned auto_increment primary key,
	username char(20) not null unique,
	password char(32) not null,
	email varchar(50) not null
);

drop table if exists article;
create table article(
	artiid int unsigned auto_increment primary key,
	artiname char(30) not null unique,
	cateid int unsigned not null,
	author char(30) not null,
	artides text not null,
	artidetail text not null,
	ishot tinyint(1) default 0,
	puttime int unsigned not null
);

drop table if exists article_cate;
create table article_cate(
	cateid int unsigned auto_increment primary key,
	catename varchar(50) unique
);

DROP TABLE IF EXISTS web_user;
CREATE TABLE web_user(
	id int unsigned auto_increment primary key,
	username varchar(20) not null unique,
	password char(32) not null,
	sex enum("男","女","保密") not null default "保密",
	face varchar(50) not null,
	regtime int unsigned not null
);

DROP TABLE IF EXISTS web_album;
CREATE TABLE web_album(
	id int unsigned auto_increment key,
	artiid int unsigned not null,
	albumpath varchar(50) not null
);

insert into web_admin(username,password,email) values ('twilighter','e6bbadd8f9380191294a95a10b3df486','1529726299@qq.com');

