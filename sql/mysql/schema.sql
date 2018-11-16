DROP TABLE IF EXISTS  `formation_comment`;
CREATE TABLE `formation_comment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `user_id` INT (11) NOT NULL,
  `created` INT (11) NOT NULL,
  `comment` VARCHAR(150) NOT NULL
) ENGINE=InnoDB COMMENT='table comment de formation' DEFAULT CHARSET=utf8;