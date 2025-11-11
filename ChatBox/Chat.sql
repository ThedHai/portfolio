-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--


use `chat`;



CREATE TABLE IF NOT EXISTS `chat` (
  `c_id` int NOT NULL,
  `message` text NOT NULL,
  `frm` int NOT NULL,
  `to` int NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;



CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` text NOT NULL
) ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'John Doe', 'Real123'),
(2, 'Johanna Doe', 'RealWW'),
(3, 'Raoul Merik', 'Bens4@'),
(4, 'Moses Ali', 'Randance12'),
(5, 'Fatima Bravo', 'Wel12@'),
(6, 'Rachel Middleton', 'Bwn127');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `c_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;