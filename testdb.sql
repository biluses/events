

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 't3chn0', 'abbceb6b040b662b565323c600f7a856');



CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `region` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `promoter` varchar(70) DEFAULT NULL,
  `lineup` varchar(300) DEFAULT NULL,
  `cost` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `flyer` varchar(200) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;