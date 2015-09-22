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
  `Alim_tipo` VARCHAR(50) NULL COMMENT '',
  `Alim_quantidade` VARCHAR(50) NOT NULL COMMENT '',
  `Usuario_US_email` VARCHAR(50) NOT NULL COMMENT '',
  `Alim_calorias` FLOAT NOT NULL COMMENT '',
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

INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Alecrim',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Alho',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Canela',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cheiro-verde',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cominho',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Curry',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Gengibre',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Hortelã',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Louro',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Mostarda (grão)',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Noz-moscada',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pimenta',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Raiz-forte',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Sal',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Salsão',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Suco de limão',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Tomilho',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Vinagre',0,0,'Temperos',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Acelga',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Agrião',0,0,'Verduras',' ');		
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Alface',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Alga marinha',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Almeirão',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Chicória',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Couve',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Erva-doce',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Escarola',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Espinafre',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Jiló',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Maxixe',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Mostarda',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Nabo',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pepino',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pimentão',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Rabanete',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Repolho',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Rúcula',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Salsão',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Taioba',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Tomate',0,0,'Verduras',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Água',0,0,'Bebidas',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Café',0,0,'Bebidas',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Chá',0,0,'Bebidas',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Limonada',0,0,'Bebidas',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Abóbora',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Abobrinha',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Alcachofra',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Aspargo',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Berinjela',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Beterraba',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Brócolis',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Broto de bambu',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Broto de feijão',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cebola',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cebolinha',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cenoura',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Chuchu',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cogumelo',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Couve-flor',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Ervilha fresca',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Palmito',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Quiabo',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Vagem',36,10,'Legumes',' ');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Abacate',39.6,11,'Frutas','1/4 de unidade pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Abacaxi',39.6,11,'Frutas','1 rodela pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Abricó',39.6,11,'Frutas','2 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Ameixa',39.6,11,'Frutas','2 unidades pequenas');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Amora',39.6,11,'Frutas','1 pires (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Banana-maçã',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Banana-nanica',39.6,11,'Frutas','1/2 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Banana-ouro',39.6,11,'Frutas','2 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Banana-prata',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Caju',39.6,11,'Frutas','2 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Caqui',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Carambola',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cereja',39.6,11,'Frutas','10 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Damasco seco',39.6,11,'Frutas','4 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Figo fresco',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Framboesa',39.6,11,'Frutas','1/2 copo');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Fruta-do-conde',39.6,11,'Frutas','1/2 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Goiaba',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Grapefruit',39.6,11,'Frutas','1/2 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Jabuticaba',39.6,11,'Frutas','1 pires (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Kiwi',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Laranja',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Lima-da-pérsia',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Maçã',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Mamão',39.6,11,'Frutas','1 fatia pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Manga',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Maracujá',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Melancia',39.6,11,'Frutas','1 fatia média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Melão',39.6,11,'Frutas','1 fatia média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Morango',39.6,11,'Frutas','10 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Nectarina',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Papaia',39.6,11,'Frutas','1/4 de unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pera',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pêssego',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pitanga',39.6,11,'Frutas','1 xícara (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Salada de frutas',39.6,11,'Frutas','1/2 porção');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Tâmara',39.6,11,'Frutas','2 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Tangerina',39.6,11,'Frutas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Uva',39.6,11,'Frutas','12 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Uva-passa',39.6,11,'Frutas','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Manteiga',54,15,'Gorduras','1 colher (chá) rasa');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Margarina',54,15,'Gorduras','1 colher (chá) rasa');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Óleo',54,15,'Gorduras','1 colher (chá) rasa');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Azeite',54,15,'Gorduras','1 colher (chá) rasa');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Creme de leite',54,15,'Gorduras','1 colher (chá) rasa');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Creme chantili',54,15,'Gorduras','1 colher (sobremesa) rasa');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Arroz',72,20,'Grãos e Farináceos','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Aveia em flocos',72,20,'Grãos e Farináceos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Bardana',72,20,'Grãos e Farináceos','2 pedaços pequenos');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Batata',72,20,'Grãos e Farináceos','1 unidade média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Batata-doce',72,20,'Grãos e Farináceos','1 unidade pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Creme de milho',72,20,'Grãos e Farináceos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cuscuz',72,20,'Grãos e Farináceos','1 fatia média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Ervilha',72,20,'Grãos e Farináceos','4 colheres(sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Farelo de aveia',72,20,'Grãos e Farináceos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Farelo de trigo',72,20,'Grãos e Farináceos','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Farinha de trigo',72,20,'Grãos e Farináceos','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Farofa',72,20,'Grãos e Farináceos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Fava',72,20,'Grãos e Farináceos','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Feijão',72,20,'Grãos e Farináceos','4 colheres(sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Feijão-branco',72,20,'Grãos e Farináceos','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Flocos de arroz',72,20,'Grãos e Farináceos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Flocos de milho',72,20,'Grãos e Farináceos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Fubá',72,20,'Grãos e Farináceos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Gergelim',72,20,'Grãos e Farináceos','1 colher (sobremesa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Germe de trigo',72,20,'Grãos e Farináceos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Grão-de-bico',72,20,'Grãos e Farináceos','3 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Lentilha',72,20,'Grãos e Farináceos','4 colheres(sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Macarrão cozido',72,20,'Grãos e Farináceos','1 xícara (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Maisena',72,20,'Grãos e Farináceos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Mandioca',72,20,'Grãos e Farináceos','1 pedaço pequeno');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Mandioquinha',72,20,'Grãos e Farináceos','3 pedaços pequenos');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Matzá/azimo',72,20,'Grãos e Farináceos','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Milho verde',72,20,'Grãos e Farináceos','3 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Polenta assada',72,20,'Grãos e Farináceos','1 fatia pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Purê de batata',72,20,'Grãos e Farináceos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Risoto',72,20,'Grãos e Farináceos','1 1/2 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cereal matinal de milho',72,20,'Grãos e Farináceos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Goma para tapioca',72,20,'Grãos e Farináceos','2 colheres (sopa) rasas');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Trigo-sarraceno',72,20,'Grãos e Farináceos','1 1/2 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cream-cracker',72,20,'Pães e biscoitos salgados','3 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Biscoito de água e sal',72,20,'Pães e biscoitos salgados','3 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Broa de milho',72,20,'Pães e biscoitos salgados','1/3 de unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Croissant',72,20,'Pães e biscoitos salgados','1/3 de unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pão de centeio',72,20,'Pães e biscoitos salgados','1 fatia');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pão comum',72,20,'Pães e biscoitos salgados','1 fatia');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pão de forma',72,20,'Pães e biscoitos salgados','1 fatia');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pão de glúten',72,20,'Pães e biscoitos salgados','1 fatia');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pão de hambúrguer',72,20,'Pães e biscoitos salgados','1/3 de unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pão de cachorro-quente',72,20,'Pães e biscoitos salgados','1/3 de unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pão de leite',72,20,'Pães e biscoitos salgados','1 fatia');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pão de queijo',72,20,'Pães e biscoitos salgados','1 unidade pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pão francês',72,20,'Pães e biscoitos salgados','1/2 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pão integral',72,20,'Pães e biscoitos salgados','1 fatia');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pão italiano',72,20,'Pães e biscoitos salgados','1 fatia pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pão sírio',72,20,'Pães e biscoitos salgados','1 unidade pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Torrada',72,20,'Pães e biscoitos salgados','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Almôndega',90,25,'Carnes','1 unidade média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Arenque defumado',90,25,'Carnes','1 porção pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Atum em conserva',90,25,'Carnes','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Aves sem pele',90,25,'Carnes','1 porção pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Bacalhau',90,25,'Carnes','1 pires (café)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cabrito',90,25,'Carnes','1 porção pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Camarão seco',90,25,'Carnes','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Caranguejo',90,25,'Carnes','1 pires (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Carne de soja',90,25,'Carnes','1 porção média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Carne magra de vaca',90,25,'Carnes','1 porção média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Carne moída',90,25,'Carnes','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Carne-seca',90,25,'Carnes','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Coelho',90,25,'Carnes','1 porção pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cordeiro',90,25,'Carnes','1 porção pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Fígado de boi',90,25,'Carnes','1 porção pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Hambúrguer',90,25,'Carnes','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Lagosta',90,25,'Carnes','1 porção pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Língua',90,25,'Carnes','1 fatia fina');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Lingüiça',90,25,'Carnes','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Lombo defumado',90,25,'Carnes','1 porção pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Lula',90,25,'Carnes','1 pires (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Marisco',90,25,'Carnes','1 xícara (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Miolo',90,25,'Carnes','1 porção pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Miúdos',90,25,'Carnes','1 porção pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Ostras/mexilhões',90,25,'Carnes','5 unidades médias');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Ovo',90,25,'Carnes','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Ovo de codorna',90,25,'Carnes','4 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Peito de peru defumado',90,25,'Carnes','2 fatias finas');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Peixe em conserva',90,25,'Carnes','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Peixe fresco',90,25,'Carnes','1 porção média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Peixe salgado',90,25,'Carnes','1 porção pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Polvo',90,25,'Carnes','1 pires (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Porco',90,25,'Carnes','1/2 porção pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Presunto',90,25,'Carnes','1 fatia fina');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Quibe assado',90,25,'Carnes','1 fatia média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Quibe cru',90,25,'Carnes','1 porção média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Rã',90,25,'Carnes','1 pires (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Rosbife',90,25,'Carnes','2 fatias finas');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Salmão defumado',90,25,'Carnes','1 porção pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Salsicha',90,25,'Carnes','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Sardinha em óleo',90,25,'Carnes','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Sardinha em tomate',90,25,'Carnes','3 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Sardinha fresca',90,25,'Carnes','5 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Vieira',90,25,'Carnes','1 pires (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Alouette natural',90,25,'Queijos','1 colher (sopa) rasa');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Camembert',90,25,'Queijos','1 fatia pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Fondue',90,25,'Queijos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Gorgonzola',90,25,'Queijos','1 fatia pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Gruyère',90,25,'Queijos','1 fatia pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Minas',90,25,'Queijos','1 fatia média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Mussarela',90,25,'Queijos','1 fatia pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Mussarela de búfala',90,25,'Queijos','1/2 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Parmesão',90,25,'Queijos','1 colher (sopa) rasa');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Polenguinho',90,25,'Queijos','1 unidade');		
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Prato',90,25,'Queijos','1 fatia pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Provolone',90,25,'Queijos','1 fatia pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Tofu',90,25,'Queijos','1 fatia grande');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Requeijão',90,25,'Queijos','2 colheres (sobremesa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Ricota',90,25,'Queijos','1 fatia grande');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Roquefort',90,25,'Queijos','1 fatia pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Coalhada seca',151.2,42,'Leite e derivados','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Creme de leite',151.2,42,'Leite e derivados','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Iogurte',151.2,42,'Leite e derivados','1 copo = 200ml');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Iogurte desnatado',151.2,42,'Leite e derivados','2 copos = 400ml');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Leite de soja',151.2,42,'Leite e derivados','1/2 copo = 100ml');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Leite integral',151.2,42,'Leite e derivados','1 copo = 200ml');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Leite integral em pó',151.2,42,'Leite e derivados','1 1/2 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Leite desnatado',151.2,42,'Leite e derivados','2 copos = 400ml');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Amêndoa',18,5,'Aperitivos e lanches','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Amendoim',162,45,'Aperitivos e lanches','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Azeitona',18,5,'Aperitivos e lanches','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Barra de cereais',100.8,28,'Aperitivos e lanches','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Batata chips',424.8,118,'Aperitivos e lanches','80g');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Batata frita',396,110,'Aperitivos e lanches','porção grande');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Beirute',504,140,'Aperitivos e lanches','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Biscoito de polvilho',216,60,'Aperitivos e lanches','50g');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Castanha de caju',126,35,'Aperitivos e lanches','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Caviar',90,25,'Aperitivos e lanches','4 colheres (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Croquete',36,10,'Aperitivos e lanches','1 unidade pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Coxinha',36,10,'Aperitivos e lanches','1 unidade pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Empadinha',36,10,'Aperitivos e lanches','1 unidade pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Esfirra',36,10,'Aperitivos e lanches','1 unidade pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Folhado',36,10,'Aperitivos e lanches','1 unidade pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Hambúrguer',259.2,72,'Aperitivos e lanches','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Misto-quente',324,90,'Aperitivos e lanches','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Nozes',180,50,'Aperitivos e lanches','1/2 xícara (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pastel',36,10,'Aperitivos e lanches','1 unidade pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Patê de berinjela',36,10,'Aperitivos e lanches','1 colher (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Patê de fígado',54,15,'Aperitivos e lanches','1 colher (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Patê de galinha',36,10,'Aperitivos e lanches','1 colher (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pinhão cozido',144,40,'Aperitivos e lanches','1 xícara (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pistache',180,50,'Aperitivos e lanches','1/2 xícara (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Quibe',36,10,'Aperitivos e lanches','1 unidade pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Sanduíche tipo americano',576,160,'Aperitivos e lanches','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Tapioca',324,90,'Aperitivos e lanches','1 porção');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Torresmo',108,30,'Aperitivos e lanches','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Torta salgada',180,50,'Aperitivos e lanches','1 pedaço médio');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Tremoço',198,55,'Aperitivos e lanches','1 xícara (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Água de coco',36,10,'Bebidas normais','200ml');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Batida de frutas',216,60,'Bebidas normais','100ml');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Caldo de cana',162,45,'Bebidas normais','200ml');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cerveja ou chope',86.4,24,'Bebidas normais','200ml');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Gim',144,40,'Bebidas normais','1 dose');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Licor',180,50,'Bebidas normais','1 dose');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Refrigerante',79.2,22,'Bebidas normais','200ml');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Suco de maçã',90,25,'Bebidas normais','1 caixinha');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Suco de vegetais',54,15,'Bebidas normais','1 caixinha');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Saquê',144,40,'Bebidas normais','1 dose');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Vermute',144,40,'Bebidas normais','1 dose');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Vinho',126,35,'Bebidas normais','1 taça');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Vodca',144,40,'Bebidas normais','1 dose');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Uísque',144,40,'Bebidas normais','1 dose');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Bala',7.2,2,'Diet e light','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cappuccino',18.5,'Diet e light','1 colher (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Chocolate em pó',36,10,'Diet e light','1 colher (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Frozen yogurt',61.2,17,'Diet e light','1 porção');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Gelatina',18,5,'Diet e light','1 taça');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Geleia',10.8,3,'Diet e light','1 colher (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Groselha',18,5,'Diet e light','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Iogurte',64.8,18,'Diet e light','1 copo');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pudim',72,20,'Diet e light','1 porção');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Refresco',18,5,'Diet e light','1 copo');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Sorvete',133.2,37,'Diet e light','1 bola');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Picolé',43.2,12,'Diet e light','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Waffle',10.8,3,'Diet e light','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Achocolatados',90,25,'Doces','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Açúcar',72,20,'Doces','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Açúcar mascavo',72,20,'Doces','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Alfajor',324,90,'Doces','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Arroz-doce',126,35,'Doces','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Bala',21.6,6,'Doces','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Biscoito recheado',108,30,'Doces','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Bolachinha',90,25,'Doces','3 unidades');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Bolo simples',180,50,'Doces','1 fatia');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Bomba de crème',504,140,'Doces','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Brigadeiro',108,30,'Doces','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Canjica',162,45,'Doces','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Chiclete',21.6,6,'Doces','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Chocolate',216,60,'Doces','1 tabelete pequeno');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Coberturas',90,25,'Doces','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cocada',144,40,'Doces','1 unidade pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Coco ralado',54,15,'Doces','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Cookie',90,25,'Doces','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Doce de abóbora',126,35,'Doces','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Doce de leite',90,25,'Doces','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Fios de ovos',252,70,'Doces','1 porção');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Gelatina',68.4,19,'Doces','1 taça');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Goiabada',72,20,'Doces','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Leite de coco',216,60,'Doces','1/2 copo');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Maria-mole',144,40,'Doces','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Mel',61.2,17,'Doces','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Merengue',216,60,'Doces','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Musse de chocolate',198,55,'Doces','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Paçoca',126,35,'Doces','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pamonha',198,55,'Doces','1 taça');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Panetone',126,35,'Doces','1 fatia fina');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Picolé com leite',144,40,'Doces','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Picolé de frutas',72,20,'Doces','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pudim',144,40,'Doces','1 fatia fina');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Sonho',360,100,'Doces','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Sorvete',180,50,'Doces','1 bola');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Suspiro',90,25,'Doces','1 unidade pequena');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Torta doce',198,55,'Doces','1 fatia média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Canelone',72,20,'Massas','1 unidade média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Capelete',72,20,'Massas','1/2 xícara (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Lasanha',612,170,'Massas','1 fatia média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Nhoque',72,20,'Massas','3 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Panqueca',252,70,'Massas','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Pizza',252,70,'Massas','1 fatia média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Ravioli',72,20,'Massas','1/2 xícara (chá)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Bife à parmegiana',486,135,'Pratos','1 porção');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Estrogonofe',	198,55,'Pratos','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Feijoada',90,25,'Pratos','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Homos',108,30,'Pratos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Kafta',216,60,'Pratos','1 espetinho');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Sashimi',90,25,'Pratos','1 porção');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Suflê de legumes',144,40,'Pratos','1 porção média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Suflê de queijo',216,	60,'Pratos','1 porção média');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Sushi',54,15,'Pratos','1 unidade');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Vatapá',126,35,'Pratos','1 porção');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Bolonhesa',61.2,17,'Molhos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Branco',61.2,17,'Molhos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Ketchup',36,10,'Molhos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Inglês',25.2,7,'Molhos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Mostarda',25.2,7,'Molhos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Maionese',144,40,'Molhos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Camarão com catupiry',180,50,'Molhos','2 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Salada de maionese',198,55,'Molhos','1 colher (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Tabule, sem azeite',72,20,'Molhos','3 colheres (sopa)');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Caldo de carne',36,10,'Sopas','1 concha');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Caldo de galinha',72,20,'Sopas','1 concha');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Canja, sem pele',108,30,'Sopas','1 concha');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Consomê de carne',18,5,'Sopas','1 concha');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Creme de aspargo',108,30,'Sopas','1 concha');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Creme de cebola',54,15,'Sopas','1 concha');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Creme de cogumelo',108,30,'Sopas','1 concha');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Creme de ervilha',126,35,'Sopas','1 concha');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Sopa de feijão branco',126,35,'Sopas','1 concha');			
INSERT INTO Alimento (Alim_nome, Alim_calorias, Alim_pontos, Alim_tipo, Alim_quantidade) VALUES ('Sopa de vegetais, enlatada',126,35,'Sopas','1 concha');			
