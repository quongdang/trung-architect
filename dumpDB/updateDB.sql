ALTER TABLE `projects` 
ADD COLUMN `metadata_vn` LONGTEXT NULL AFTER `created`,
ADD COLUMN `metadata_en` LONGTEXT NULL AFTER `metadata_vn`;


CREATE TABLE `project_image` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `project_id` INT NULL,
  `image_link` TEXT NULL,
  `description_vn` LONGTEXT NULL,
  `description_en` LONGTEXT NULL,
  `display` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`));
