USE meuspontos;

CREATE TABLE IF NOT EXISTS `Usuario` (
  `email` varchar(50) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `IMC` float NOT NULL,
  `limPontos` float NOT NULL,
  `altura` float NOT NULL,
  `peso` float NOT NULL,
  `dataNasc` date NOT NULL,
  `senha` varchar(60) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Alimento` (
  `nome` VARCHAR(150) NOT NULL,
  `pontos` FLOAT NOT NULL,
  `tipo` VARCHAR(20) NULL,
  `quantidade` VARCHAR(50) NOT NULL,
  `user_email` VARCHAR(50) NOT NULL,
  `calorias` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nome`),
  INDEX `fk_Alimento_Usuario1_idx` (`user_email` ASC) ,
  CONSTRAINT `fk_Alimento_Usuario1`
    FOREIGN KEY (`user_email`)
    REFERENCES `Usuario` (`email`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `Consumo` (
  `email_user` VARCHAR(50) NOT NULL,
  `nome_alim` VARCHAR(150) NOT NULL,
  `refeicao` VARCHAR(15) NOT NULL,
  `totalPtsAlimento` FLOAT NOT NULL,
  `quantidade` FLOAT NOT NULL,
  `totalPtsDia` FLOAT NOT NULL,
  `dataHora` DATETIME NOT NULL,
  PRIMARY KEY (`email_user`, `nome_alim`, `dataHora`) ,
  INDEX `fk_Usuario_has_Alimento_Alimento1_idx` (`nome_alim` ASC) ,
  INDEX `fk_Usuario_has_Alimento_Usuario1_idx` (`email_user` ASC) ,
  CONSTRAINT `fk_Usuario_has_Alimento_Usuario1`
    FOREIGN KEY (`email_user`)
    REFERENCES `Usuario` (`email`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Usuario_has_Alimento_Alimento1`
    FOREIGN KEY (`nome_alim`)
    REFERENCES `Alimento` (`nome`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `ControlePeso` (
  `data` DATETIME NOT NULL ,
  `peso` FLOAT NOT NULL ,
  `us_email` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`data`, `us_email`)  ,
  INDEX `fk_ControlePeso_Usuario1_idx` (`us_email` ASC) ,
  CONSTRAINT `fk_ControlePeso_Usuario1`
    FOREIGN KEY (`us_email`)
    REFERENCES `Usuario` (`email`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
