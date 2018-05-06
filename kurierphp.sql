
CREATE TABLE `parcel` (
  `id` int(11) NOT NULL,
  `sender` text NOT NULL,
  `recipient` text NOT NULL,
  `weight` int(11) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `parcel`
--

INSERT INTO `parcel` (`id`, `sender`, `recipient`, `weight`, `date`) VALUES
(4, 'aa', 'bb', 12, '0000-00-00'),
(5, 'aa', 'bb', 12, '2017-12-07'),
(9, 'aa', 'bb', 12, '0000-00-00'),
(10, 'RzeszÃ³w, Poniatowskiego 7', 'Stefan Burczymucha, Warszawa, Al. Jerozolimskie 123a', 10, '07-12-2017'),
(11, 'RzeszÃ³w, Poniatowskiego 7', 'Adam MaÅ‚ysz, 12-432 WisÅ‚a 154', 120, '08-12-2017'),
(12, 'Brzesko, Rynek 14', 'CzesÅ‚aw Niemen, 11-431 Olsztyn, ul. Åšpiewaka 18c', 5000, '09-12-2017'),
(13, 'Brzesko, Rynek 14', 'Jan DÅ‚ugosz, 33-300 Nowy SÄ…cz, WÄ™gierska 45', 8932, '24-02-2032'),
(14, 'RzeszÃ³w, Poniatowskiego 7', 'Stefan Burczymucha, Warszawa, Al. Jerozolimskie 123a', 12, '18-12-2017'),
(15, 'RzeszÃ³w, Poniatowskiego 7', 'Stefan Burczymucha, Warszawa, Al. Jerozolimskie 123a', 599, '19-12-2017'),
(16, 'TarnÃ³w, Lwowska 4', 'KrakÃ³w', 540, '01-01-2018');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `username` varchar(36) NOT NULL,
  `email` varchar(36) NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `address`) VALUES
('Czwarty', 'czwarty@email.com', '$2y$10$EYPg/X8YV09kvTGq/qp1J.a3Vg0PgVbSdbciOApnhA0hrSWKzWn3O', 'Warszawa, al. Jerozolimskie 555'),
('Drugi', 'drugi@email.com', '$2y$10$QnJ7ofVMQyB6zN8Aa4daV.dTS8fFZpkV5RAsmj6Lwp/Hj1tfDi/hi', 'RzeszÃ³w, Poniatowskiego 7'),
('PiÄ…ty', 'piaty@email.com', '$2y$10$CmYo1/X0W.F1i8jlTja..e4gVQ0h2DngryOTsZzqpxflnlNaxEQ6i', 'Nowy SÄ…cz, Å»Ã³Å‚kiewskiego 23a'),
('Pierwszy', 'pierwszy@email.com', '$2y$10$Ss7UDAJJWoWlCjJZ/dzaA..jiAE8BOQ5dOItQBnox1ac6CpOV6mGy', 'TarnÃ³w, Lwowska 4'),
('Siedem', 'siedem@email.com', '1234', 'Szymbark 342'),
('Trzeci', 'trzeci@email.com', '$2y$10$UL5rWLbgr7grP0/NEhHAeeGn/Dw2YXvyQOmqOB3jxLOWjbkKDRzAO', 'Brzesko, Rynek 14');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `parcel`
--
ALTER TABLE `parcel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
