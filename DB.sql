-- MySQL Script generated by MySQL Workbench
-- Thu Mar 31 00:15:21 2016
-- Model: New Model    Version: 1.0
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
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(45) NULL,
  `lastname` VARCHAR(45) NULL,
  `email` VARCHAR(50) NULL,
  `password` VARCHAR(50) NULL,
  `createdDate` DATETIME NULL,
  `updatedDate` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`catagories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`catagories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`courses` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NULL,
  `instructorId` INT NULL,
  `catagoryId` INT NULL,
  `price` VARCHAR(10) NULL,
  `createdDate` DATETIME NULL,
  `updatedDate` DATETIME NULL,
  `introductionVideo` VARCHAR(200) NULL,
  `isActive` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fCatagoryId_idx` (`catagoryId` ASC),
  INDEX `fInstructorId_idx` (`instructorId` ASC),
  CONSTRAINT `fCatagoryId`
    FOREIGN KEY (`catagoryId`)
    REFERENCES `mydb`.`catagories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fInstructorId`
    FOREIGN KEY (`instructorId`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`chapters`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`chapters` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `no` INT NULL,
  `courseId` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fCourseId_idx` (`courseId` ASC),
  CONSTRAINT `fCourseId`
    FOREIGN KEY (`courseId`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`courseDetails`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`courseDetails` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `courseId` INT NULL,
  `summary` VARCHAR(1000) NULL,
  `objectives` VARCHAR(1000) NULL,
  `imageURL` VARCHAR(1000) NULL,
  PRIMARY KEY (`id`),
  INDEX `fCourseId_idx` (`courseId` ASC),
  CONSTRAINT `fCourseId`
    FOREIGN KEY (`courseId`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`courseToUser`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`courseToUser` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `courseId` INT NULL,
  `userId` INT NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fUserId_idx` (`userId` ASC),
  INDEX `fCourseId_idx` (`courseId` ASC),
  CONSTRAINT `fCourseId`
    FOREIGN KEY (`courseId`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`educationLevels`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`educationLevels` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`lessonLegends`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`lessonLegends` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`documentTypes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`documentTypes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`lessons`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`lessons` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `chapterId` INT NULL,
  `name` VARCHAR(200) NULL,
  `duration` VARCHAR(10) NULL,
  `typeId` INT NULL,
  `content` VARCHAR(2000) NULL,
  PRIMARY KEY (`id`),
  INDEX `fChapterId_idx` (`chapterId` ASC),
  INDEX `fLessonTypeId_idx` (`typeId` ASC),
  CONSTRAINT `fLessonTypeId`
    FOREIGN KEY (`typeId`)
    REFERENCES `mydb`.`documentTypes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fChapterId`
    FOREIGN KEY (`chapterId`)
    REFERENCES `mydb`.`chapters` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`lessonProgress`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`lessonProgress` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NULL,
  `lessonId` INT NULL,
  `lessonLegendId` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fLessenLegendId_idx` (`lessonLegendId` ASC),
  INDEX `fLessonId_idx` (`lessonId` ASC),
  INDEX `fUserId_idx` (`userId` ASC),
  CONSTRAINT `fUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fLessonId`
    FOREIGN KEY (`lessonId`)
    REFERENCES `mydb`.`lessons` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fLessenLegendId`
    FOREIGN KEY (`lessonLegendId`)
    REFERENCES `mydb`.`lessonLegends` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`occupations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`occupations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`paymentProcess`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`paymentProcess` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NULL,
  `courseId` INT NULL,
  `situation` VARCHAR(200) NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fCourseId_idx` (`courseId` ASC),
  INDEX `fUserId_idx` (`userId` ASC),
  CONSTRAINT `fUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fCourseId`
    FOREIGN KEY (`courseId`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`userTypes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`userTypes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ratings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ratings` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `courseId` INT NULL,
  `stars` VARCHAR(1) NULL,
  PRIMARY KEY (`id`),
  INDEX `fCourseId_idx` (`courseId` ASC),
  CONSTRAINT `fCourseId`
    FOREIGN KEY (`courseId`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`examTypes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`examTypes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`examProcess`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`examProcess` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NULL,
  `chapterId` INT NULL,
  `isSuccess` INT NULL,
  `Grade` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `ChapterId_idx` (`chapterId` ASC),
  INDEX `fUserId_idx` (`userId` ASC),
  CONSTRAINT `fUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ChapterId`
    FOREIGN KEY (`chapterId`)
    REFERENCES `mydb`.`chapters` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`documents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`documents` (
  `id` INT NOT NULL,
  `documentTypeId` INT NULL,
  `lessonId` INT NULL,
  `uploadedDate` DATETIME NULL,
  `explanation` VARCHAR(300) NULL,
  `name` VARCHAR(200) NULL,
  INDEX `fLessonId_idx` (`lessonId` ASC),
  PRIMARY KEY (`id`),
  INDEX `fDocumentTypeId_idx` (`documentTypeId` ASC),
  CONSTRAINT `fLessonId`
    FOREIGN KEY (`lessonId`)
    REFERENCES `mydb`.`lessons` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fDocumentTypeId`
    FOREIGN KEY (`documentTypeId`)
    REFERENCES `mydb`.`documentTypes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`userDetails`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`userDetails` (
  `age` VARCHAR(2) NULL,
  `phone` VARCHAR(15) NULL,
  `typeId` INT NULL,
  `occupationId` INT NULL,
  `educationId` INT NULL,
  `fbUserName` VARCHAR(45) NULL,
  `twUserName` VARCHAR(45) NULL,
  `about` VARCHAR(1000) NULL,
  `profileImageURL` VARCHAR(200) NULL,
  `userId` INT NULL,
  INDEX `fOccupation_idx` (`occupationId` ASC),
  INDEX `fEducationLevelId_idx` (`educationId` ASC),
  INDEX `fUserId_idx` (`userId` ASC),
  INDEX `fUserTypeId_idx` (`typeId` ASC),
  CONSTRAINT `fOccupationId`
    FOREIGN KEY (`occupationId`)
    REFERENCES `mydb`.`occupations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fEducationLevelId`
    FOREIGN KEY (`educationId`)
    REFERENCES `mydb`.`educationLevels` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fUserTypeId`
    FOREIGN KEY (`typeId`)
    REFERENCES `mydb`.`userTypes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NULL,
  `permission` INT NULL,
  `courseId` INT NULL,
  `createdDate` DATETIME NULL,
  `updatedDate` DATETIME NULL,
  `isActive` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fUserId_idx` (`userId` ASC),
  INDEX `fCourseId_idx` (`courseId` ASC),
  CONSTRAINT `fUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fCourseId`
    FOREIGN KEY (`courseId`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`discussions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`discussions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NULL,
  `courseId` INT NULL,
  `title` VARCHAR(45) NULL,
  `createdDate` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fUserId_idx` (`userId` ASC),
  INDEX `fCourseId_idx` (`courseId` ASC),
  CONSTRAINT `fUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fCourseId`
    FOREIGN KEY (`courseId`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`posts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NULL,
  `discussionId` INT NULL,
  `createdDate` VARCHAR(45) NULL,
  `updatedDate` VARCHAR(45) NULL,
  `content` VARCHAR(2000) NULL,
  PRIMARY KEY (`id`),
  INDEX `fUserId_idx` (`userId` ASC),
  INDEX `fDisscussionId_idx` (`discussionId` ASC),
  CONSTRAINT `fUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fDisscussionId`
    FOREIGN KEY (`discussionId`)
    REFERENCES `mydb`.`discussions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`questions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `question` VARCHAR(45) NULL,
  `correctAnswer` VARCHAR(45) NULL,
  `duration` INT NULL,
  `examTypeId` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fExamTypeId_idx` (`examTypeId` ASC),
  CONSTRAINT `fExamTypeId`
    FOREIGN KEY (`examTypeId`)
    REFERENCES `mydb`.`examTypes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`exams`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`exams` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `questionId` INT NULL,
  `createdDate` DATETIME NULL,
  `updatedDate` DATETIME NULL,
  `InstructorId` INT NULL,
  `chapterId` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fInstructorId_idx` (`questionId` ASC),
  INDEX `fChapterId_idx` (`chapterId` ASC),
  CONSTRAINT `fInstructorId`
    FOREIGN KEY (`questionId`)
    REFERENCES `mydb`.`questions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fChapterId`
    FOREIGN KEY (`chapterId`)
    REFERENCES `mydb`.`chapters` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cities` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`universities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`universities` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `cityId` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fCity_idx` (`cityId` ASC),
  CONSTRAINT `fCity`
    FOREIGN KEY (`cityId`)
    REFERENCES `mydb`.`cities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`sems`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`sems` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `personalName` VARCHAR(45) NULL,
  `personalSurname` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `telephone` VARCHAR(45) NULL,
  `universityId` INT NULL,
  `createdDate` DATETIME NULL,
  `updatedDate` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fUniversity_idx` (`universityId` ASC),
  CONSTRAINT `fUniversity`
    FOREIGN KEY (`universityId`)
    REFERENCES `mydb`.`universities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`views`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`views` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `viewerId` INT NULL,
  `documentId` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fViewerId_idx` (`viewerId` ASC),
  INDEX `fDocumentId_idx` (`documentId` ASC),
  CONSTRAINT `fViewerId`
    FOREIGN KEY (`viewerId`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fDocumentId`
    FOREIGN KEY (`documentId`)
    REFERENCES `mydb`.`documents` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`IPTables`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`IPTables` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NULL,
  `IP` VARCHAR(15) NULL,
  `where` VARCHAR(100) NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fUserId_idx` (`userId` ASC),
  CONSTRAINT `fUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bills`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`bills` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `billNo` VARCHAR(10) NULL,
  `courseId` INT NULL,
  `userId` INT NULL,
  `createdDate` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fUserId_idx` (`userId` ASC),
  INDEX `fCourseId_idx` (`courseId` ASC),
  CONSTRAINT `fUserId`
    FOREIGN KEY (`userId`)
    REFERENCES `mydb`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fCourseId`
    FOREIGN KEY (`courseId`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
