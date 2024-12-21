-- Active: 1731046081466@@127.0.0.1@3306@db_lingrow
-- Exported from QuickDBD: https://www.quickdatabasediagrams.com/
-- Link to schema: https://app.quickdatabasediagrams.com/#/d/CdfgqZ
-- NOTE! If you have used non-SQL datatypes in your design, you will have to change these here.

CREATE TABLE `Users` (
    `id_user` int NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    `nama` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `id_lang` int,
    `id_plan` int,
    PRIMARY KEY (`id_user`)
);

CREATE TABLE `Language` (
    `id_lang` int NOT NULL AUTO_INCREMENT,
    `name_lang` varchar(255) NOT NULL,
    PRIMARY KEY (`id_lang`)
);

CREATE TABLE `Course` (
    `id_course` int NOT NULL,
    `name_course` varchar(255) NOT NULL,
    `id_lang` int NOT NULL,
    `description` varchar(255) NOT NULL,
    `id_user` int NOT NULL,
    `id_plan` int,
    PRIMARY KEY (`id_course`)
);

CREATE TABLE `Artikel` (
    `id_artikel` int NOT NULL,
    `judul_artikel` varchar(255) NOT NULL,
    `description` varchar(255) NOT NULL,
    `create_at` date NOT NULL,
    `id_lang` int NOT NULL,
    PRIMARY KEY (`id_artikel`)
);

CREATE TABLE `Plan` (
    `id_plan` int NOT NULL,
    `name_plan` varchar(255) NOT NULL,
    `price_plan` int NOT NULL,
    `description` varchar(255) NOT NULL,
    PRIMARY KEY (`id_plan`)
);

ALTER TABLE `Users`
ADD CONSTRAINT `fk_Users_id_lang` FOREIGN KEY (`id_lang`) REFERENCES `Language` (`id_lang`);

ALTER TABLE `Users`
ADD CONSTRAINT `fk_Users_id_plan` FOREIGN KEY (`id_plan`) REFERENCES `Plan` (`id_plan`);

ALTER TABLE `Course`
ADD CONSTRAINT `fk_Course_id_lang` FOREIGN KEY (`id_lang`) REFERENCES `Language` (`id_lang`);

ALTER TABLE `Course`
ADD CONSTRAINT `fk_Course_id_user` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id_user`);

ALTER TABLE `Course`
ADD CONSTRAINT `fk_Course_id_plan` FOREIGN KEY (`id_plan`) REFERENCES `Plan` (`id_plan`);

ALTER TABLE `Artikel`
ADD CONSTRAINT `fk_Artikel_id_lang` FOREIGN KEY (`id_lang`) REFERENCES `Language` (`id_lang`);