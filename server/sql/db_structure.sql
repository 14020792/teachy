SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `user`, `instructor`, `subject`, `instructor_subject`, `criterion`, `assessment`; 

CREATE TABLE IF NOT EXISTS `user`(
	id int unsigned    PRIMARY KEY AUTO_INCREMENT,
	username varchar(50) NOT NULL UNIQUE,
	password varchar(255) NOT NULL,
	email varchar(100) NOT NULL UNIQUE,
	name varchar(100) NOT NULL,
	avatar text,
	code varchar(25) NOT NULL UNIQUE,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    	updated_at datetime
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS `instructor`(
        id int unsigned    PRIMARY KEY AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        email varchar(100),
        avatar text,
        code varchar(25) NOT NULL UNIQUE,
	info text,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at datetime
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS `subject`(
        id int unsigned    PRIMARY KEY AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        code varchar(25) NOT NULL UNIQUE
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS `instructor_subject`(
        id int unsigned    PRIMARY KEY AUTO_INCREMENT,
	instructor_id int unsigned NOT NULL,
	subject_id int unsigned NOT NULL,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at datetime,
	FOREIGN KEY (instructor_id) REFERENCES `instructor`(id) ON DELETE CASCADE,
	FOREIGN KEY (subject_id) REFERENCES `subject`(id) ON DELETE CASCADE
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS `criterion`(
        id int unsigned    PRIMARY KEY AUTO_INCREMENT,
	text text NOT NULL
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS `assessment`(
        id int unsigned    PRIMARY KEY AUTO_INCREMENT,
	ins_sub_id int unsigned NOT NULL,
	criterion_id int unsigned NOT NULL,
	user_id int unsigned NOT NULL,
	value double NOT NULL DEFAULT 0,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at datetime,
	FOREIGN KEY (ins_sub_id) REFERENCES `instructor_subject`(id) ON DELETE CASCADE,
	FOREIGN KEY (criterion_id) REFERENCES `criterion`(id) ON DELETE CASCADE,
	FOREIGN KEY (user_id) REFERENCES `user`(id) ON DELETE CASCADE
) ENGINE=InnoDB CHARACTER SET=utf8;

SET FOREIGN_KEY_CHECKS=1;

