CREATE TABLE IF NOT EXISTS topicobd.usuario (
  usuario_id INT(11) NOT NULL AUTO_INCREMENT,
  usuario_email VARCHAR(255) NULL,
  usuario_senha VARCHAR(255) NULL,
  usuario_privilegio VARCHAR(45) NULL,
  usuario_data DATE NULL,
  PRIMARY KEY (usuario_id));


CREATE TABLE IF NOT EXISTS topicobd.bannerPrincipal (
  banner_id INT(11) NOT NULL AUTO_INCREMENT,
  banner_titulo VARCHAR(255) NULL,
  banner_desc LONGTEXT NULL,
  banner_url VARCHAR(255) NULL,
  banner_img VARCHAR(255) NULL,
  PRIMARY KEY (banner_id))
ENGINE = InnoDB;




CREATE TABLE IF NOT EXISTS topicobd.pagina_treinamento (
  treina_id INT(11) NOT NULL AUTO_INCREMENT,
  treina_titulo VARCHAR(255) NULL,
  treina_objetivo VARCHAR(255) NULL,
  treina_requisito VARCHAR(255) NULL,
  treina_conteudo LONGTEXT NULL,
  treina_ch VARCHAR(45) NULL,
  treina_valor FLOAT NULL,
  treina_imagem VARCHAR(255) NULL,
  PRIMARY KEY (treina_id))
ENGINE = InnoDB
COMMENT =    ;



CREATE TABLE IF NOT EXISTS topicobd.paginaSobre (
  sobre_id INT(11) NOT NULL AUTO_INCREMENT,
  sobre_descricao LONGTEXT NULL,
  sobre_missao LONGTEXT NULL,
  sobre_visao LONGTEXT NULL,
  sobre_valores LONGTEXT NULL,
  PRIMARY KEY (sobre_id))
ENGINE = InnoDB
COMMENT =  ;



CREATE TABLE IF NOT EXISTS topicobd.paginaSobre_img (
  sobreImg_id INT(11) NOT NULL AUTO_INCREMENT,
  sobreImg_nome VARCHAR(255) NULL,
  sobreImg_tipo VARCHAR(45) NULL,
  sobreImg_caminho VARCHAR(45) NULL,
  paginaSobre_sobre_id INT(11) NOT NULL,
  PRIMARY KEY (sobreImg_id),
  INDEX fk_paginaSobre_img_paginaSobre_idx (paginaSobre_sobre_id ASC),
  CONSTRAINT(11) fk_paginaSobre_img_paginaSobre
    FOREIGN KEY (paginaSobre_sobre_id)
    REFERENCES topicobd.paginaSobre (sobre_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS topicobd.pagina_consultoria (
  consulto_id INT(11) NOT NULL AUTO_INCREMENT,
  consulto_titulo VARCHAR(255) NULL,
  consulto_descricao LONGTEXT NULL,
  consulto_valor FLOAT NULL,
  consulto_imagem VARCHAR(255) NULL,
  PRIMARY KEY (consulto_id))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS topicobd.pagina_contato (
  contato_id INT(11) NOT NULL AUTO_INCREMENT,
  contato_email VARCHAR(255) NULL,
  contato_telefone VARCHAR(255) NULL,
  contato_rua VARCHAR(255) NULL,
  contato_cidade VARCHAR(255) NULL,
  contato_estado VARCHAR(255) NULL,
  contato_long VARCHAR(255) NULL,
  contato_lat VARCHAR(255) NULL,
  PRIMARY KEY (contato_id))
ENGINE = InnoDB
COMMENT =    ;



CREATE TABLE IF NOT EXISTS topicobd.funcionarios (
  func_id INT(11) NOT NULL AUTO_INCREMENT,
  func_nome VARCHAR(255) NULL,
  func_especialidade VARCHAR(255) NULL,
  func_desc VARCHAR(255) NULL,
  func_imagem VARCHAR(255) NULL,
  PRIMARY KEY (func_id))
ENGINE = InnoDB
COMMENT =  ;


