CREATE TABLE IF NOT EXISTS `meuspontos`.`Usuario` (
  `us_id` INT(11) NOT NULL AUTO_INCREMENT,
  `us_email` VARCHAR(50) NOT NULL,
  `us_senha` VARCHAR(60) NOT NULL,
  `us_nome` VARCHAR(150) NOT NULL,
  `us_dataNasc` DATE NOT NULL,
  `us_sexo` VARCHAR(9) NOT NULL,
  `us_altura` FLOAT NOT NULL,
  `us_peso` FLOAT NOT NULL,
  `us_limPontos` FLOAT NOT NULL,
  `us_IMC` FLOAT NOT NULL,
  PRIMARY KEY (`us_id`),
  UNIQUE INDEX `us_email_UNIQUE` (`us_email` ASC))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `meuspontos`.`Alimento` (
  `alim_id` INT(11) NOT NULL AUTO_INCREMENT,
  `alim_descricao` VARCHAR(150) NOT NULL,
  `alim_tipo` VARCHAR(20) NOT NULL,
  `alim_qtdePontos` FLOAT NOT NULL,
  `alim_medida` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`alim_id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `meuspontos`.`Consumo` (
  `hp_idUsuario` INT(11) NOT NULL,
  `cons_idAlimento` INT(11) NOT NULL,
  `cons_refeicao` VARCHAR(15) NOT NULL,
  `cons_quantidade` FLOAT NOT NULL,
  `cons_dataHora` DATETIME NOT NULL,
  PRIMARY KEY (`cons_idAlimento`, `hp_idUsuario`),
  INDEX `fk_Usuario_has_Alimento_Usuario1_idx` (`hp_idUsuario` ASC),
  CONSTRAINT `fk_1Usuario_consome_nAlimentos`
    FOREIGN KEY (`hp_idUsuario`)
    REFERENCES `meuspontos`.`Usuario` (`us_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_1Alimento_consumido_nUsuarios`
    FOREIGN KEY (`cons_idAlimento`)
    REFERENCES `meuspontos`.`Alimento` (`alim_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `meuspontos`.`HistoricoPeso` (
  `hp_data` DATETIME NOT NULL,
  `hp_peso` FLOAT NOT NULL,
  `hp_idUsuario` INT(11) NOT NULL,
  PRIMARY KEY (`hp_data`, `hp_idUsuario`),
  INDEX `fk_ControlePeso_Usuario1_idx` (`hp_idUsuario` ASC),
  CONSTRAINT `fk_HistoricoPeso_idUsuario`
    FOREIGN KEY (`hp_idUsuario`)
    REFERENCES `meuspontos`.`Usuario` (`us_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;