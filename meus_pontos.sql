CREATE TABLE IF NOT EXISTS `MeusPontos`.`Usuario` (
  `US_email` VARCHAR(50) NOT NULL COMMENT '',
  `US_nome` VARCHAR(150) NOT NULL COMMENT '',
  `US_sexo` VARCHAR(9) NOT NULL COMMENT '',
  `US_IMC` FLOAT NOT NULL COMMENT '',
  `US_idade` INT NOT NULL COMMENT '',
  `US_limPontos` FLOAT NOT NULL COMMENT '',
  `US_altura` FLOAT NOT NULL COMMENT '',
  `US_peso` FLOAT NOT NULL COMMENT '',
  `US_dataNasc` DATETIME NOT NULL COMMENT '',
  `US_senha` VARCHAR(20) NOT NULL COMMENT '',
  PRIMARY KEY (`US_email`)  COMMENT '')
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `MeusPontos`.`Alimento` (
  `Alim_nome` VARCHAR(150) NOT NULL COMMENT '',
  `Alim_pontos` FLOAT NOT NULL COMMENT '',
  `Alim_tipo` VARCHAR(20) NULL COMMENT '',
  `Alim_quantidade` VARCHAR(50) NOT NULL COMMENT '',
  `Usuario_US_email` VARCHAR(50) NOT NULL COMMENT '',
  `Alim_calorias` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`Alim_nome`)  COMMENT '',
  INDEX `fk_Alimento_Usuario1_idx` (`Usuario_US_email` ASC)  COMMENT '',
  CONSTRAINT `fk_Alimento_Usuario1`
    FOREIGN KEY (`Usuario_US_email`)
    REFERENCES `MeusPontos`.`Usuario` (`US_email`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `MeusPontos`.`Consumo` (
  `Usuario_US_email` VARCHAR(50) NOT NULL COMMENT '',
  `Alimento_Alim_nome` VARCHAR(150) NOT NULL COMMENT '',
  `Cons_refeicao` VARCHAR(15) NOT NULL COMMENT '',
  `Cons_totalPtsAlimento` FLOAT NOT NULL COMMENT '',
  `Cons_quantidade` FLOAT NOT NULL COMMENT '',
  `Cons_totalPtsDia` FLOAT NOT NULL COMMENT '',
  `Cons_dataHora` DATETIME NOT NULL COMMENT '',
  PRIMARY KEY (`Usuario_US_email`, `Alimento_Alim_nome`)  COMMENT '',
  INDEX `fk_Usuario_has_Alimento_Alimento1_idx` (`Alimento_Alim_nome` ASC)  COMMENT '',
  INDEX `fk_Usuario_has_Alimento_Usuario1_idx` (`Usuario_US_email` ASC)  COMMENT '',
  CONSTRAINT `fk_Usuario_has_Alimento_Usuario1`
    FOREIGN KEY (`Usuario_US_email`)
    REFERENCES `MeusPontos`.`Usuario` (`US_email`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Usuario_has_Alimento_Alimento1`
    FOREIGN KEY (`Alimento_Alim_nome`)
    REFERENCES `MeusPontos`.`Alimento` (`Alim_nome`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `MeusPontos`.`ControlePeso` (
  `CP_data` DATETIME NOT NULL COMMENT '',
  `CP_peso` FLOAT NOT NULL COMMENT '',
  `Usuario_US_email` VARCHAR(50) NOT NULL COMMENT '',
  PRIMARY KEY (`CP_data`, `Usuario_US_email`)  COMMENT '',
  INDEX `fk_ControlePeso_Usuario1_idx` (`Usuario_US_email` ASC)  COMMENT '',
  CONSTRAINT `fk_ControlePeso_Usuario1`
    FOREIGN KEY (`Usuario_US_email`)
    REFERENCES `MeusPontos`.`Usuario` (`US_email`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;