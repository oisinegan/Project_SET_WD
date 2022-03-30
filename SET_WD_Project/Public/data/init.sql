CREATE TABLE IF NOT EXISTS `Projectdb`.`Customer`
(
    `idCustomer` INT NOT NULL,
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
    PRIMARY KEY (`idCustomer`)
    )
    ENGINE = InnoDB;