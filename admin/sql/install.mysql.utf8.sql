DROP TABLE IF EXISTS `#__degrees`;
 
CREATE TABLE `#__degrees` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`degree` VARCHAR(50) NOT NULL,
	`published` tinyint(4) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

CREATE TABLE `#__years` (
	id int primary key NOT NULL AUTO_INCREMENT,
	year int primary key,
	published tinyint(4) DEFAULT '1'
);

CREATE TABLE `#__students` (
	id int primary key,
	name varchar(50) NOT NULL,
	id_degree varchar(50) NOT NULL,
	year varchar(50) NOT NULL
);

INSERT INTO `#__degrees` (`degree`) VALUES
('Computer Science'),
('Music');

INSERT INTO `#__years` (`year`) VALUES
(2016), (2015), (2014);