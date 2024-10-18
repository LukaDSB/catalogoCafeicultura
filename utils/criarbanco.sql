CREATE SCHEMA `projetocade` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE `projetocafe`.`cafes` (
  `idcafes` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL,
  `descricao` VARCHAR(255) NULL,
  `imagem` VARCHAR(255) NULL,
PRIMARY KEY (`idcafes`));

INSERT INTO `projetocafe`.`cafes` (`idcafes`, `nome`, `descricao`, `imagem`) VALUES ('1', 'Conilon', 'A planta do café Conilon possui folhas enrugadas e grãos menores e arredondados.', '1.jpg');
INSERT INTO `projetocafe`.`cafes` (`idcafes`, `nome`, `descricao`, `imagem`) VALUES ('2', 'Arábica', 'Variedade mais produzida e consumida do mundo, o café Arábica possui sabor puro e suave, é naturalmente mais adocicado e um pouco ácido.', '2.jpg');

CREATE TABLE `projetocafe`.`tiposdecafe` (
  `tiposdecafeid` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL,
PRIMARY KEY (`tiposdecafeid`));

INSERT INTO `projetocafe`.`tiposdecafe` (`tiposdecafeid`, `nome`) VALUES ('1', 'Pretos');
INSERT INTO `projetocafe`.`tiposdecafe` (`tiposdecafeid`, `nome`) VALUES ('2', 'Verdes');
INSERT INTO `projetocafe`.`tiposdecafe` (`tiposdecafeid`, `nome`) VALUES ('3', 'Ardidos');
  
