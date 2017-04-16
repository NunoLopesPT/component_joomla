DROP TABLE IF EXISTS `#__degrees`;
DROP TABLE IF EXISTS `#__years`;
DROP TABLE IF EXISTS `#__students`;

CREATE TABLE `#__degrees` (
  `id`        INT(11)     NOT NULL AUTO_INCREMENT,
  `degree`    VARCHAR(50) NOT NULL,
  `published` TINYINT(4)  NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  AUTO_INCREMENT = 0
  DEFAULT CHARSET = utf8;

CREATE TABLE `#__years` (
  year      INT PRIMARY KEY,
  published TINYINT(4) DEFAULT '1'
);

CREATE TABLE `#__students` (
  id          INT PRIMARY KEY,
  name        VARCHAR(50) NOT NULL,
  id_degree   INT         NOT NULL,
  year        INT         NOT NULL,
  observation VARCHAR(255)
);

INSERT INTO `#__degrees` (`degree`) VALUES
  ('Computer Science'),
  ('Music');

INSERT INTO `#__years` (`year`) VALUES
  (2016), (2015), (2014);