-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Student` (
  `StudentID` INT NOT NULL,
  `FirstName` VARCHAR(45) NULL,
  `LastName` VARCHAR(45) NULL,
  `EmailAddress` VARCHAR(45) NULL,
  `PhoneNumber` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  PRIMARY KEY (`StudentID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Teacher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Teacher` (
  `TeacherID` INT NOT NULL,
  `FirstName` VARCHAR(45) NULL,
  `LastName` VARCHAR(45) NULL,
  `EmailAddress` VARCHAR(45) NULL,
  `PhoneNumber` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  PRIMARY KEY (`TeacherID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Question`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Question` (
  `QuestionID` INT NOT NULL,
  `QuestionContent` VARCHAR(500) NULL,
  `Student_StudentID` INT NOT NULL,
  PRIMARY KEY (`QuestionID`),
  INDEX `fk_Question_Student1_idx` (`Student_StudentID` ASC),
  CONSTRAINT `fk_Question_Student1`
    FOREIGN KEY (`Student_StudentID`)
    REFERENCES `mydb`.`Student` (`StudentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Comment` (
  `CommentID` INT NOT NULL,
  `CommentContent` VARCHAR(500) NULL,
  `Question_QuestionID` INT NOT NULL,
  PRIMARY KEY (`CommentID`),
  INDEX `fk_Comment_Question1_idx` (`Question_QuestionID` ASC),
  CONSTRAINT `fk_Comment_Question1`
    FOREIGN KEY (`Question_QuestionID`)
    REFERENCES `mydb`.`Question` (`QuestionID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`School`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`School` (
  `SchoolID` INT NOT NULL,
  `SchoolName` VARCHAR(45) NULL,
  PRIMARY KEY (`SchoolID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Department` (
  `DepartmentID` INT NOT NULL,
  `DirectorName` VARCHAR(45) NULL,
  `DepartmentName` VARCHAR(45) NULL,
  `DepartmentDescription` VARCHAR(45) NULL,
  `School_SchoolID` INT NOT NULL,
  PRIMARY KEY (`DepartmentID`),
  INDEX `fk_Department_School_idx` (`School_SchoolID` ASC),
  CONSTRAINT `fk_Department_School`
    FOREIGN KEY (`School_SchoolID`)
    REFERENCES `mydb`.`School` (`SchoolID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Class` (
  `ClassID` INT NOT NULL,
  `ClassName` VARCHAR(45) NULL,
  `ClassDescription` VARCHAR(45) NULL,
  `Department_DepartmentID` INT NOT NULL,
  `Teacher_TeacherID` INT NOT NULL,
  PRIMARY KEY (`ClassID`),
  INDEX `fk_Class_Department1_idx` (`Department_DepartmentID` ASC),
  INDEX `fk_Class_Teacher1_idx` (`Teacher_TeacherID` ASC),
  CONSTRAINT `fk_Class_Department1`
    FOREIGN KEY (`Department_DepartmentID`)
    REFERENCES `mydb`.`Department` (`DepartmentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Class_Teacher1`
    FOREIGN KEY (`Teacher_TeacherID`)
    REFERENCES `mydb`.`Teacher` (`TeacherID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`StudentTeacher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`StudentTeacher` (
  `Teacher_TeacherID` INT NOT NULL,
  `Student_StudentID` INT NOT NULL,
  INDEX `fk_StudentTeacher_Teacher1_idx` (`Teacher_TeacherID` ASC),
  INDEX `fk_StudentTeacher_Student1_idx` (`Student_StudentID` ASC),
  CONSTRAINT `fk_StudentTeacher_Teacher1`
    FOREIGN KEY (`Teacher_TeacherID`)
    REFERENCES `mydb`.`Teacher` (`TeacherID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_StudentTeacher_Student1`
    FOREIGN KEY (`Student_StudentID`)
    REFERENCES `mydb`.`Student` (`StudentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Answer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Answer` (
  `AnswerID` INT NOT NULL AUTO_INCREMENT,
  `AnswerText` VARCHAR(500) NULL,
  `AnswerValid` TINYINT NOT NULL,
  `Question_QuestionID` INT NOT NULL,
  PRIMARY KEY (`AnswerID`),
  INDEX `fk_Answer_Question1_idx` (`Question_QuestionID` ASC),
  CONSTRAINT `fk_Answer_Question1`
    FOREIGN KEY (`Question_QuestionID`)
    REFERENCES `mydb`.`Question` (`QuestionID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;