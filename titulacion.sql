SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema titulacion
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `titulacion` ;
CREATE SCHEMA IF NOT EXISTS `titulacion` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `titulacion` ;

-- -----------------------------------------------------
-- Table `titulacion`.`alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`alumno` (
  `id_alumno` INT NOT NULL AUTO_INCREMENT,
  `numerocuenta` VARCHAR(9) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apaterno` VARCHAR(45) NOT NULL,
  `amaterno` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `contrasenia` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`id_alumno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`telefonos_alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`telefonos_alumno` (
  `telelefono` VARCHAR(10) NOT NULL,
  `alumno_id_alumno` INT NOT NULL,
  INDEX `fk_telefonos_alumno_alumno_idx` (`alumno_id_alumno` ASC),
  PRIMARY KEY (`alumno_id_alumno`),
  CONSTRAINT `fk_telefonos_alumno_alumno`
    FOREIGN KEY (`alumno_id_alumno`)
    REFERENCES `titulacion`.`alumno` (`id_alumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`secretaria_tecnica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`secretaria_tecnica` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `correo` VARCHAR(45) NOT NULL,
  `contrasenia` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apaterno` VARCHAR(45) NULL,
  `amaterno` VARCHAR(45) NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`sinodal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`sinodal` (
  `id_sinodal` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apaterno` VARCHAR(45) NOT NULL,
  `amaterno` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `grado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_sinodal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`tutor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`tutor` (
  `id_tutor` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apaterno` VARCHAR(45) NOT NULL,
  `amaterno` VARCHAR(45) NOT NULL,
  `grado` VARCHAR(45) NULL,
  PRIMARY KEY (`id_tutor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`telefonos_tutor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`telefonos_tutor` (
  `telefonos` VARCHAR(10) NOT NULL,
  `tutor_id_tutor` INT NOT NULL,
  INDEX `fk_telefonos_tutor_tutor1_idx` (`tutor_id_tutor` ASC),
  CONSTRAINT `fk_telefonos_tutor_tutor1`
    FOREIGN KEY (`tutor_id_tutor`)
    REFERENCES `titulacion`.`tutor` (`id_tutor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`telefonos_sinodal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`telefonos_sinodal` (
  `telefono` VARCHAR(10) NULL,
  `sinodal_id_sinodal` INT NOT NULL,
  INDEX `fk_telefonos_sinodal_sinodal1_idx` (`sinodal_id_sinodal` ASC),
  CONSTRAINT `fk_telefonos_sinodal_sinodal1`
    FOREIGN KEY (`sinodal_id_sinodal`)
    REFERENCES `titulacion`.`sinodal` (`id_sinodal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`examen_profesional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`examen_profesional` (
  `id_examen` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NULL,
  `resultado` VARCHAR(45) NULL,
  PRIMARY KEY (`id_examen`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`cat_estado_proceso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`cat_estado_proceso` (
  `id_estado_proceso` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_estado_proceso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`proceso_titulacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`proceso_titulacion` (
  `id_proceso` INT NOT NULL AUTO_INCREMENT,
  `fecha_inicio` TIMESTAMP NOT NULL,
  `fecha_fin` TIMESTAMP NULL,
  `id_alumno` INT NOT NULL,
  `id_examen` INT NOT NULL,
  `id_secretaria_tecnica` INT NULL,
  `id_estado` INT NOT NULL,
  PRIMARY KEY (`id_proceso`),
  INDEX `fk_proceso_titulacion_alumno1_idx` (`id_alumno` ASC),
  INDEX `fk_proceso_titulacion_examen_profesional1_idx` (`id_examen` ASC),
  INDEX `fk_proceso_titulacion_secretaria_tecnica1_idx` (`id_secretaria_tecnica` ASC),
  INDEX `fk_proceso_titulacion_cat_estado_proceso1_idx` (`id_estado` ASC),
  CONSTRAINT `fk_proceso_titulacion_alumno1`
    FOREIGN KEY (`id_alumno`)
    REFERENCES `titulacion`.`alumno` (`id_alumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proceso_titulacion_examen_profesional1`
    FOREIGN KEY (`id_examen`)
    REFERENCES `titulacion`.`examen_profesional` (`id_examen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proceso_titulacion_secretaria_tecnica1`
    FOREIGN KEY (`id_secretaria_tecnica`)
    REFERENCES `titulacion`.`secretaria_tecnica` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proceso_titulacion_cat_estado_proceso1`
    FOREIGN KEY (`id_estado`)
    REFERENCES `titulacion`.`cat_estado_proceso` (`id_estado_proceso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`proceso_titulacion_has_sinodal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`proceso_titulacion_has_sinodal` (
  `proceso_titulacion_id_proceso` INT NOT NULL,
  `sinodal_id_sinodal` INT NOT NULL,
  PRIMARY KEY (`proceso_titulacion_id_proceso`, `sinodal_id_sinodal`),
  INDEX `fk_proceso_titulacion_has_sinodal_sinodal1_idx` (`sinodal_id_sinodal` ASC),
  INDEX `fk_proceso_titulacion_has_sinodal_proceso_titulacion1_idx` (`proceso_titulacion_id_proceso` ASC),
  CONSTRAINT `fk_proceso_titulacion_has_sinodal_proceso_titulacion1`
    FOREIGN KEY (`proceso_titulacion_id_proceso`)
    REFERENCES `titulacion`.`proceso_titulacion` (`id_proceso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proceso_titulacion_has_sinodal_sinodal1`
    FOREIGN KEY (`sinodal_id_sinodal`)
    REFERENCES `titulacion`.`sinodal` (`id_sinodal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`tesis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`tesis` (
  `id_tesis` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `fecha_inicio_elaboracion` TIMESTAMP NOT NULL,
  `fecha_fin_elaboracion` TIMESTAMP NOT NULL,
  `id_proceso_titulacion` INT NOT NULL,
  PRIMARY KEY (`id_tesis`),
  INDEX `fk_tesis_proceso_titulacion1_idx` (`id_proceso_titulacion` ASC),
  CONSTRAINT `fk_tesis_proceso_titulacion1`
    FOREIGN KEY (`id_proceso_titulacion`)
    REFERENCES `titulacion`.`proceso_titulacion` (`id_proceso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`alumno_has_tesis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`alumno_has_tesis` (
  `id_alumno` INT NOT NULL,
  `id_tesis` INT NOT NULL,
  PRIMARY KEY (`id_alumno`, `id_tesis`),
  INDEX `fk_alumno_has_tesis_tesis1_idx` (`id_tesis` ASC),
  INDEX `fk_alumno_has_tesis_alumno1_idx` (`id_alumno` ASC),
  CONSTRAINT `fk_alumno_has_tesis_alumno1`
    FOREIGN KEY (`id_alumno`)
    REFERENCES `titulacion`.`alumno` (`id_alumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_has_tesis_tesis1`
    FOREIGN KEY (`id_tesis`)
    REFERENCES `titulacion`.`tesis` (`id_tesis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`cat_tipo_notificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`cat_tipo_notificacion` (
  `id_tipo` INT NOT NULL,
  `descripción` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_tipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `titulacion`.`notificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `titulacion`.`notificacion` (
  `id_notificacion` INT NOT NULL AUTO_INCREMENT,
  `estado` INT NOT NULL,
  `correo_alumno` VARCHAR(45) NOT NULL,
  `fecha_envio` TIMESTAMP NULL,
  `id_secretaria` INT NOT NULL,
  `id_alumno` INT NOT NULL,
  `id_tipo` INT NOT NULL,
  PRIMARY KEY (`id_notificacion`),
  INDEX `fk_notificacion_secretaria_tecnica1_idx` (`id_secretaria` ASC),
  INDEX `fk_notificacion_alumno1_idx` (`id_alumno` ASC),
  INDEX `fk_notificacion_cat_tipo_notificacion1_idx` (`id_tipo` ASC),
  CONSTRAINT `fk_notificacion_secretaria_tecnica1`
    FOREIGN KEY (`id_secretaria`)
    REFERENCES `titulacion`.`secretaria_tecnica` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificacion_alumno1`
    FOREIGN KEY (`id_alumno`)
    REFERENCES `titulacion`.`alumno` (`id_alumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificacion_cat_tipo_notificacion1`
    FOREIGN KEY (`id_tipo`)
    REFERENCES `titulacion`.`cat_tipo_notificacion` (`id_tipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
