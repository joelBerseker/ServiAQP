CREATE TABLE `categoria` (
  `CatId` int(11) NOT NULL,
  `CatNom` varchar(60) NOT NULL,
  `CatDes` text NOT NULL,
  `CatEstReg` char(1) NOT NULL DEFAULT 'A',
  `CatFecCre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `categoria`
  MODIFY `CatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
