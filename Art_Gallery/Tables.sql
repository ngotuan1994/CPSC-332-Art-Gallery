/*
Assignment 4
Name: Tuan Ngo
CWID: 887416766
Class: CPSC 332 Database
Date: 05-10-2020
Create tables for Art Gallery database
Populate sample data for all tables 
*/

/* Create database name Art_Gallery   */
drop database if exists `Art_Gallery`;
create database Art_Gallery;
use Art_Gallery;

/* create table for ARTSTYLE */
create table if not exists `ARTSTYLE`(
    `Style_ID`  int             ,
    `Style`     varchar(30)     ,
    primary key (Style_ID)



)ENGINE=InnoDB DEFAULT CHARSET=latin1 ;




/* create table for ARTIST */

create table  IF NOT EXISTS `ARTIST` (
    `Artist_ID`     int                 ,
	`Fname`			varchar(15)	 not null,
    `Lname`			varchar(15)	 not null,
    `Phone` 		varchar(15) 		,
    `Age`			int					,
    `Address`		varchar(45)			,
    `Birth_place`	varchar(30)			,
    `StyleofArt_ID`	int	                ,
    `ArtShow_ID`    int                 ,
    primary key (Artist_ID)	,
    foreign key (StyleofArt_ID) references ARTSTYLE(Style_ID)
		
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* create table for CUSTOMER */
create table  IF NOT EXISTS `CUSTOMER` (
    `Cus_ID`            int             not null AUTO_INCREMENT,
    `Phone`				varchar(15)				 ,
	`ArtPreferences_ID`	int		not null ,
    `Favorite_Artist_ID`	int			        ,
    `Cus_name`          varchar(20)             ,
   
	primary key(Cus_ID)					,
    foreign key(Favorite_Artist_ID) references	ARTIST(Artist_ID) ON DELETE CASCADE,
    foreign key(ArtPreferences_ID) references ARTSTYLE(style_ID)    ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


/* create table for ARTKWORK */
create table  IF NOT EXISTS `ARTWORK`(
    `Artist_ID`             int         ,
    `Title_ID`              int         ,
    `Location`			varchar(50)		,
    `Price`				float			,
    `TypeofArt`			varchar(30)		,
    `DateofCreation`	date			,
    `Title`				varchar(30)		,
    `DateAcquirred`		date			,	
    primary key (Title_ID)					,
    
    foreign key (Artist_ID) references Artist(Artist_ID) ON DELETE CASCADE
    
)ENGINE=InnoDB DEFAULT CHARSET=latin1 ;



/* create table for ARTSHOW */
create table  IF NOT EXISTS `ARTSHOW`(
    `Show_ID`           int             ,
    `Artist_ID`         int             ,
    `DateandTime`		datetime		,
    `Location`			varchar(50)		,
    `Contact`			varchar(50)		,
    `ContactPhone`		varchar(30)		,
    `Title_ID`          int             ,
    `Cus_Potential_ID`  int             ,   
    primary key (Show_ID),
    foreign key (Artist_ID) references ARTIST(Artist_ID),
    foreign key (Title_ID) references ARTWORK(Title_ID),
    foreign key (Cus_Potential_ID) references CUSTOMER(Cus_ID)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` char(5) NOT NULL,
  `password` char(5) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `admin` (`ID`, `password`) VALUES
('admin', 'admin');


/* Populate table ARTSTYLE with data */
insert into ARTSTYLE values (1,'oil');
insert into ARTSTYLE values (2,'watercolor');
insert into ARTSTYLE values (3,'oil and watercolor');


/* Populate table ARTIST with data */
insert into ARTIST values (101,'John','Smith','1115555',21,'731 Fondren,Houston, TX', 'Texas',1,1);
insert into ARTIST values (102,'Hugo','Lee','2225555',35,'999 Main Street,NewYork, NY', 'New York',1,2);
insert into ARTIST values (103,'David','Nguyen','3335555',60,'111 Water Street,California, CA', 'California',2,3);
insert into ARTIST values (104,'Washington','Homes','4445555',47,'21002 Fire Street,Miami, FL', 'Florida',2,4);

/* Populate table CUSTOMER with data */
insert into CUSTOMER values (1,'1119999',1,101,'Henry Smith');
insert into CUSTOMER values (2,'2229999',1,102,'Thomas Helm');
insert into CUSTOMER values (3,'3339999',2,103,'Steve Lee');
insert into CUSTOMER values (4,'4449999',2,104,'Nothing Homes');

/* Populate table ARTWORK with data */
insert into ARTWORK values (101,001,'731 Fondren,Houston, TX',10000,'Sculpture','2018-12-12','Sunset','2019-12-20');
insert into ARTWORK values (102,002,'999 Main Street,NewYork, NY',15000,'Pottery','2015-11-17','People','2019-12-20');
insert into ARTWORK values (103,003,'111 Water Street,California, CA',16000,'Religious','2016-11-02','Moon','2019-12-20');
insert into ARTWORK values (104,004,'21002 Fire Street,Miami, FL',17000,'Still Life','2012-12-05','Monster','2019-12-20');	

/* Populate table ARKSHOW with data */
insert into ARTSHOW values (1,101,'2019-12-27 08:00:00','Black Room','9282 Fullerton Street,California,CA','8887777',001,1);
insert into ARTSHOW values (2,102,'2019-12-28 09:00:00','Outsite','1234 New Wood Street,California,CA','8887777',002,2);
insert into ARTSHOW values (3,103,'2019-12-29 14:00:00','White room','5959 King Street,California,CA','8887777',003,3);
insert into ARTSHOW values (4,104,'2019-12-30 15:00:00','Yellow room','111 Helmet BLVD,California,CA','8887777',004,4);






