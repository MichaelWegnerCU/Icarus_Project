-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema IcarusProject
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema IcarusProject
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `IcarusProject` DEFAULT CHARACTER SET utf8 ;
USE `IcarusProject` ;

CREATE TABLE IF NOT EXISTS `IcarusProject`.`users` (
`user_id` INT(8) NOT NULL AUTO_INCREMENT,
`user_ST` VARCHAR(1) NOT NULL,
`user_name` VARCHAR(30) NOT NULL,
`user_pass` VARCHAR(255) NOT NULL,
`user_email` VARCHAR(255) NOT NULL,
`user_date` DATETIME NOT NULL,
PRIMARY KEY (`user_id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `IcarusProject`.`Student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IcarusProject`.`Student` (
  `StudentID` INT NOT NULL,
  `FirstName` VARCHAR(45) NULL,
  `LastName` VARCHAR(45) NULL,
  `EmailAddress` VARCHAR(45) NULL,
  `PhoneNumber` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  PRIMARY KEY (`StudentID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IcarusProject`.`Teacher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IcarusProject`.`Teacher` (
  `TeacherID` INT NOT NULL,
  `FirstName` VARCHAR(45) NULL,
  `LastName` VARCHAR(45) NULL,
  `EmailAddress` VARCHAR(45) NULL,
  `PhoneNumber` VARCHAR(45) NULL,
  `Password` VARCHAR(45) NULL,
  PRIMARY KEY (`TeacherID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IcarusProject`.`Question`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IcarusProject`.`Question` (
  `QuestionID` INT NOT NULL,
  `QuestionContent` VARCHAR(500) NULL,
  `Student_StudentID` INT NOT NULL,
  `Teacher_TeacherID` INT NOT NULL,
  PRIMARY KEY (`QuestionID`),
  INDEX `fk_Question_Student1_idx` (`Student_StudentID` ASC),
  INDEX `fk_Question_Teacher1_idx` (`Teacher_TeacherID` ASC),
  CONSTRAINT `fk_Question_Student1`
    FOREIGN KEY (`Student_StudentID`)
    REFERENCES `IcarusProject`.`Student` (`StudentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Question_Teacher1`
    FOREIGN KEY (`Teacher_TeacherID`)
    REFERENCES `IcarusProject`.`Teacher` (`TeacherID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IcarusProject`.`Comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IcarusProject`.`Comment` (
  `CommentID` INT NOT NULL,
  `CommentContent` VARCHAR(500) NULL,
  `Question_QuestionID` INT NOT NULL,
  PRIMARY KEY (`CommentID`),
  INDEX `fk_Comment_Question1_idx` (`Question_QuestionID` ASC),
  CONSTRAINT `fk_Comment_Question1`
    FOREIGN KEY (`Question_QuestionID`)
    REFERENCES `IcarusProject`.`Question` (`QuestionID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IcarusProject`.`School`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IcarusProject`.`School` (
  `SchoolID` INT NOT NULL,
  `SchoolName` VARCHAR(45) NULL,
  PRIMARY KEY (`SchoolID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IcarusProject`.`Department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IcarusProject`.`Department` (
  `DepartmentID` INT NOT NULL,
  `DirectorName` VARCHAR(45) NULL,
  `DepartmentName` VARCHAR(45) NULL,
  `DepartmentDescription` VARCHAR(45) NULL,
  `School_SchoolID` INT NOT NULL,
  PRIMARY KEY (`DepartmentID`),
  INDEX `fk_Department_School_idx` (`School_SchoolID` ASC),
  CONSTRAINT `fk_Department_School`
    FOREIGN KEY (`School_SchoolID`)
    REFERENCES `IcarusProject`.`School` (`SchoolID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IcarusProject`.`Class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IcarusProject`.`Class` (
  `ClassID` INT NOT NULL,
  `ClassName` VARCHAR(45) NULL,
  `ClassDescription` VARCHAR(45) NULL,
  `Department_DepartmentID` INT NOT NULL,
  `Teacher_TeacherID` INT NOT NULL,
  `Student_StudentID` INT NOT NULL,
  PRIMARY KEY (`ClassID`),
  INDEX `fk_Class_Department1_idx` (`Department_DepartmentID` ASC),
  INDEX `fk_Class_Teacher1_idx` (`Teacher_TeacherID` ASC),
  INDEX `fk_Class_Student1_idx` (`Student_StudentID` ASC),
  CONSTRAINT `fk_Class_Department1`
    FOREIGN KEY (`Department_DepartmentID`)
    REFERENCES `IcarusProject`.`Department` (`DepartmentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Class_Teacher1`
    FOREIGN KEY (`Teacher_TeacherID`)
    REFERENCES `IcarusProject`.`Teacher` (`TeacherID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Class_Student1`
    FOREIGN KEY (`Student_StudentID`)
    REFERENCES `IcarusProject`.`Student` (`StudentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IcarusProject`.`StudentTeacher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IcarusProject`.`StudentTeacher` (
  `Teacher_TeacherID` INT NOT NULL,
  `Student_StudentID` INT NOT NULL,
  INDEX `fk_StudentTeacher_Teacher1_idx` (`Teacher_TeacherID` ASC),
  INDEX `fk_StudentTeacher_Student1_idx` (`Student_StudentID` ASC),
  CONSTRAINT `fk_StudentTeacher_Teacher1`
    FOREIGN KEY (`Teacher_TeacherID`)
    REFERENCES `IcarusProject`.`Teacher` (`TeacherID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_StudentTeacher_Student1`
    FOREIGN KEY (`Student_StudentID`)
    REFERENCES `IcarusProject`.`Student` (`StudentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IcarusProject`.`Answer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IcarusProject`.`Answer` (
  `AnswerID` INT NOT NULL AUTO_INCREMENT,
  `AnswerText` VARCHAR(500) NULL,
  `AnswerValid` TINYINT NOT NULL,
  `Question_QuestionID` INT NOT NULL,
  PRIMARY KEY (`AnswerID`),
  INDEX `fk_Answer_Question1_idx` (`Question_QuestionID` ASC),
  CONSTRAINT `fk_Answer_Question1`
    FOREIGN KEY (`Question_QuestionID`)
    REFERENCES `IcarusProject`.`Question` (`QuestionID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
