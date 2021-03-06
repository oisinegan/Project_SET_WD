-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema project
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema project
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema project
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8 ;
USE `project` ;

-- -----------------------------------------------------
-- Table `project`.`Admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`Admin` (
  `idAdmin` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAdmin`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `project`.`Customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`Customer` (
  `idCustomer` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `Street` VARCHAR(45) NOT NULL,
  `Town` VARCHAR(45) NOT NULL,
  `County` VARCHAR(45) NOT NULL,
  `Postcode` VARCHAR(45) NOT NULL,
  `Cardtype` VARCHAR(45) NOT NULL,
  `Cardnumber` VARCHAR(45) NOT NULL,
  `CardSecurity` INT NOT NULL,
  PRIMARY KEY (`idCustomer`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `project`.`Product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`Product` (
  `idProduct` INT NOT NULL AUTO_INCREMENT,
  `brand` VARCHAR(45) NOT NULL,
  `size` FLOAT NOT NULL,
  `price` FLOAT NOT NULL,
  `productDescription` VARCHAR(45) NOT NULL,
  `colour` VARCHAR(45) NOT NULL,
  `Admin_idAdmin` INT NOT NULL,
  PRIMARY KEY (`idProduct`, `Admin_idAdmin`),
  INDEX `fk_Product_Admin1_idx` (`Admin_idAdmin` ASC) VISIBLE,
  CONSTRAINT `fk_Product_Admin1`
    FOREIGN KEY (`Admin_idAdmin`)
    REFERENCES `project`.`Admin` (`idAdmin`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `project`.`Profile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`Profile` (
  `profileID` INT NOT NULL AUTO_INCREMENT,
  `PrevTransactions` VARCHAR(45) NOT NULL,
  `Customer_idCustomer` INT NOT NULL,
  PRIMARY KEY (`profileID`, `Customer_idCustomer`),
  INDEX `fk_Profile_Customer_idx` (`Customer_idCustomer` ASC) VISIBLE,
  CONSTRAINT `fk_Profile_Customer`
    FOREIGN KEY (`Customer_idCustomer`)
    REFERENCES `project`.`Customer` (`idCustomer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `Projectdb`.`Transaction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`Transaction` (
  `TransactionID` INT NOT NULL AUTO_INCREMENT,
  `TransactionDate` VARCHAR(45) NOT NULL,
  `DeliveryDate` VARCHAR(45) NOT NULL,
  `Customer_idCustomer` INT NOT NULL,
  PRIMARY KEY (`TransactionID`, `Customer_idCustomer`),
  INDEX `fk_Transaction_Customer1_idx` (`Customer_idCustomer` ASC) VISIBLE,
  CONSTRAINT `fk_Transaction_Customer1`
    FOREIGN KEY (`Customer_idCustomer`)
    REFERENCES `project`.`Customer` (`idCustomer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `project`.`TransactionDetail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`TransactionDetail` (
  `Transaction_TransactionID` INT NOT NULL,
  `Product_idProduct` INT NOT NULL,
  PRIMARY KEY (`Transaction_TransactionID`, `Product_idProduct`),
  INDEX `fk_TransactionDetail_Product1_idx` (`Product_idProduct` ASC) VISIBLE,
  CONSTRAINT `fk_TransactionDetail_Transaction1`
    FOREIGN KEY (`Transaction_TransactionID`)
    REFERENCES `project`.`Transaction` (`TransactionID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TransactionDetail_Product1`
    FOREIGN KEY (`Product_idProduct`)
    REFERENCES `project`.`Product` (`idProduct`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;