SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `riviera` ;
CREATE SCHEMA IF NOT EXISTS `riviera` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
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
  `time_range` INT NULL COMMENT 'numero de dias que esta disponible la propiedad.' ,
  `show_in_home` TINYINT(1)  NULL ,
  `created` DATETIME NULL ,
  `upadated` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_properties_types` (`type_id` ASC) ,
  INDEX `fk_properties_communities1` (`community_id` ASC) ,
  INDEX `fk_properties_places1` (`place_id` ASC) ,
  CONSTRAINT `fk_properties_types`
    FOREIGN KEY (`type_id` )
    REFERENCES `riviera`.`types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_communities1`
    FOREIGN KEY (`community_id` )
    REFERENCES `riviera`.`communities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_places1`
    FOREIGN KEY (`place_id` )
    REFERENCES `riviera`.`places` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  INDEX `fk_ccategories_properties_categories1` (`category_id` ASC) ,
  CONSTRAINT `fk_ccategories_properties_properties1`
    FOREIGN KEY (`property_id` )
    REFERENCES `riviera`.`properties` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ccategories_properties_categories1`
    FOREIGN KEY (`category_id` )
    REFERENCES `riviera`.`categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  INDEX `fk_pictures_properties1` (`property_id` ASC) ,
  CONSTRAINT `fk_pictures_properties1`
    FOREIGN KEY (`property_id` )
    REFERENCES `riviera`.`properties` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`properties_specials`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`properties_specials` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`properties_specials` (
  `id` INT NOT NULL ,
  `property_id` INT NOT NULL ,
  `special_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_properties_specials_properties1` (`property_id` ASC) ,
  INDEX `fk_properties_specials_specials1` (`special_id` ASC) ,
  CONSTRAINT `fk_properties_specials_properties1`
    FOREIGN KEY (`property_id` )
    REFERENCES `riviera`.`properties` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_properties_specials_specials1`
    FOREIGN KEY (`special_id` )
    REFERENCES `riviera`.`specials` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`feactures`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`feactures` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`feactures` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `created` DATETIME NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riviera`.`feactures_properties`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `riviera`.`feactures_properties` ;

CREATE  TABLE IF NOT EXISTS `riviera`.`feactures_properties` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `feacture_id` INT NOT NULL ,
  `property_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_feactures_properties_feactures1` (`feacture_id` ASC) ,
  INDEX `fk_feactures_properties_properties1` (`property_id` ASC) ,
  CONSTRAINT `fk_feactures_properties_feactures1`
    FOREIGN KEY (`feacture_id` )
    REFERENCES `riviera`.`feactures` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_feactures_properties_properties1`
    FOREIGN KEY (`property_id` )
    REFERENCES `riviera`.`properties` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `riviera`.`types`
-- -----------------------------------------------------
START TRANSACTION;
USE `riviera`;
INSERT INTO `riviera`.`types` (`id`, `name`, `created`, `updated`) VALUES (NULL, 'rental', NULL, NULL);
INSERT INTO `riviera`.`types` (`id`, `name`, `created`, `updated`) VALUES (NULL, 'real estate', NULL, NULL);

COMMIT;