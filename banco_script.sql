CREATE DATABASE wda_crud;
USE wda_crud;
CREATE TABLE customers (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  cpf_cnpj varchar(14) NOT NULL,
  birthdate datetime NOT NULL,
  address varchar(255) NOT NULL,
  hood varchar(100) NOT NULL,
  zip_code varchar(8) NOT NULL,
  city varchar(100) NOT NULL,
  state varchar(100) NOT NULL,
  phone varchar(11) NOT NULL,
  mobile varchar(11) NOT NULL,
  ie varchar(12) NOT NULL,
  created datetime NOT NULL,
  modified datetime NOT NULL
);

USE wda_crud;

INSERT INTO `customers` (`name`, `cpf_cnpj`, `birthdate`, `address`,
`hood`, `zip_code`, `city`, `state`, `phone`, `mobile`, `ie`, `created`, `modified`)
VALUES ('Fulano de Tal', '123.456.789-00', '1989-01-01', 'Rua da Web, 123',
'Internet', '12345678', 'Teste', 'SP', '15 85555555', '15985555555', '12345643576',
'2023-09-20 11:00:00', '2023-09-20 11:00:00'),

('Cilclano de Tal', '123.456.789-00', '1985-11-01', 'Rua da Web, 123',
'Internet', '12345678', 'Teste', 'SP', '15 85555555', '15985555555', '12345643576',
'2023-09-20 11:00:00', '2023-09-20 11:00:00');