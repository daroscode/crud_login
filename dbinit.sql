-- Copiando estrutura do banco de dados para crud_login
CREATE DATABASE IF NOT EXISTS `crud_login` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `crud_login`;

-- Copiando estrutura para tabela crud_login.access
CREATE TABLE IF NOT EXISTS `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `access` (`id`, `login`, `pass`) VALUES
    (1, 'admin', '$2y$10$O7G1a7TvErtyWnFxuXtGCOrhOx9fqU8ry9QsIzil5DnBzP5H01OhC');

-- Copiando estrutura para tabela crud_login.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `caddate` date NOT NULL,
  `status` int(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

