SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `riviera` ;
CREATE SCHEMA IF NOT EXISTS `riviera` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `riviera` ;

-- -----------------------------------------------------
-- Table `riviera`.`types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`types` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`communities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`communities` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`communities` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`, `name`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`places`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`places` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`places` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `long` VARCHAR(45) NULL ,
  `lat` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`properties`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`properties` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`properties` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `type_id` INT NOT NULL ,
  `community_id` INT NOT NULL ,
  `place_id` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `description` TEXT NULL ,
  `price` DOUBLE NULL ,
  `video` TEXT NULL ,
  `picture` VARCHAR(100) NULL COMMENT 'validar que si esta en home debe tener el picture' ,
  `arriving` DATE NULL COMMENT 'numero de dias que esta disponible la propiedad.' ,
  `departing` DATE NULL ,
  `show_in_home` TINYINT(1)  NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_properties_types` (`type_id` ASC) ,
  INDEX `fk_properties_communities1` (`community_id` ASC) ,
  INDEX `fk_properties_places1` (`place_id` ASC) )
ENGINE = InnoDB
COMMENT = 'des' ;


-- -----------------------------------------------------
-- Table `riviera`.`categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`categories` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `description` TEXT NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`categories_properties`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`categories_properties` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`categories_properties` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `property_id` INT NOT NULL ,
  `category_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ccategories_properties_properties1` (`property_id` ASC) ,
  INDEX `fk_ccategories_properties_categories1` (`category_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`pictures`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`pictures` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`pictures` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `property_id` INT NOT NULL ,
  `order` INT NULL ,
  `path` VARCHAR(100) NOT NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_pictures_properties1` (`property_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`specials`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`specials` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`specials` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `description` TEXT NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`news`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`news` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`news` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NULL ,
  `content` TEXT NULL ,
  `link` VARCHAR(45) NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`pages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`pages` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`pages` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NULL ,
  `content` LONGTEXT NULL ,
  `order` INT NULL ,
  `slug` VARCHAR(45) NULL ,
  `description` TEXT NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`properties_specials`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`properties_specials` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`properties_specials` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `property_id` INT NOT NULL ,
  `special_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_properties_specials_properties1` (`property_id` ASC) ,
  INDEX `fk_properties_specials_specials1` (`special_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`features`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`features` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`features` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`features_properties`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`features_properties` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`features_properties` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `feature_id` INT NOT NULL ,
  `property_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_feactures_properties_feactures1` (`feature_id` ASC) ,
  INDEX `fk_feactures_properties_properties1` (`property_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`roles` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`users` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `role_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  INDEX `fk_users_roles` (`role_id` ASC) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `riviera`.`types`
-- -----------------------------------------------------
START TRANSACTION;
USE `riviera`;
INSERT INTO `riviera`.`types` (`id`, `name`, `created`, `updated`) VALUES (1, 'Rental', NULL, NULL);
INSERT INTO `riviera`.`types` (`id`, `name`, `created`, `updated`) VALUES (2, 'Real Estate', NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `riviera`.`roles`
-- -----------------------------------------------------
START TRANSACTION;
USE `riviera`;
INSERT INTO `riviera`.`roles` (`id`, `name`) VALUES (1, 'admin');
INSERT INTO `riviera`.`roles` (`id`, `name`) VALUES (2, 'user');
INSERT INTO `riviera`.`roles` (`id`, `name`) VALUES (3, 'client');

COMMIT;

-- -----------------------------------------------------
-- Data for table `riviera`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `riviera`;
INSERT INTO `riviera`.`users` (`id`, `username`, `password`, `role_id`) VALUES (1, 'admin', '55e23b9fe6ba18157d8f45b9785079d87851d791', 1);

COMMIT;
