
CREATE DATABASE IF NOT EXISTS `users` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `users`;


CREATE TABLE `user` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `sdt` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `ngaysinh` varchar(10) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `cmndtruoc` varchar(200) NOT NULL,
  `cmndsau` varchar(200) NOT NULL
);

INSERT INTO `user` (`sdt`, `email`, `hoten`, `ngaysinh`, `diachi`,`cmndtruoc`,`cmndsau`) VALUES
('0327321942','taitran@gmail.com','Trần Tiển Anh Tài', '13/09/2002','Huế','cmnd1truoc.jpg','cmnd1sau.jpg');

CREATE TABLE `account` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `statuss` varchar(1) NOT NULL
);

INSERT INTO `account` (`username`, `pass`,`statuss`) VALUES
('0327321942','123456','1');


