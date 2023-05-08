CREATE DATABASE  IF NOT EXISTS `friends`;
USE `friends`;

DROP TABLE IF EXISTS `friend`;

CREATE TABLE `friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `friend`
VALUES
(1,'Ross','Geller'),
(2,'Monica','Geller'),
(3,'Phoebe','Buffay'),
(4,'Joey','Tribbiani');