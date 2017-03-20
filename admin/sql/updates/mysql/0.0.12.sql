CREATE TABLE `#__years` (
	year int primary key,
	published tinyint(4) DEFAULT '1'
);

INSERT INTO `#__years` (`year`) VALUES
(2016), (2015), (2014);