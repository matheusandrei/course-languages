-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema course
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema course
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `course` DEFAULT CHARACTER SET utf8 ;
USE `course` ;

-- -----------------------------------------------------
-- Table `course`.`courseStudent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `course`.`courseStudent` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `courseGroup_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `course`.`courseTeacher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `course`.`courseTeacher` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `course`.`course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `course`.`course` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) NOT NULL,
  `description` VARCHAR(245) NOT NULL,
  `courseTeacher_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_course_courseTeacher1_idx` (`courseTeacher_id` ASC),
  CONSTRAINT `fk_course_courseTeacher1`
    FOREIGN KEY (`courseTeacher_id`)
    REFERENCES `course`.`courseTeacher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `course`.`coursegroup`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `course`.`coursegroup` (
  `course_id` INT NOT NULL,
  `courseStudent_id` INT NOT NULL,
  PRIMARY KEY (`course_id`, `courseStudent_id`),
  INDEX `fk_course_has_courseStudent_courseStudent1_idx` (`courseStudent_id` ASC),
  INDEX `fk_course_has_courseStudent_course1_idx` (`course_id` ASC),
  CONSTRAINT `fk_course_has_courseStudent_course1`
    FOREIGN KEY (`course_id`)
    REFERENCES `course`.`course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_has_courseStudent_courseStudent1`
    FOREIGN KEY (`courseStudent_id`)
    REFERENCES `course`.`courseStudent` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
