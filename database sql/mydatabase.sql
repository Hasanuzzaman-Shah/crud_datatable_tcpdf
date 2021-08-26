
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `members` (
        `id` int(11) NOT NULL,
        `firstname` varchar(30) NOT NULL,
        `lastname` varchar(30) NOT NULL,
        `address` text NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `members` (`id`, `firstname`, `lastname`, `address`) VALUES
      (1, 'neovic', 'devierte', 'silay city'),
      (2, 'gemalyn', 'cepe', 'carmen, bohol'),
      (3, 'lee', 'apilinga', 'bacolod'),
      (4, 'julyn', 'divinagracia', 'eb magalona'),
      (5, 'cristine', 'demapanag', 'talisay');


ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;


