
--
-- Database: `sjinnovation`
--

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--



CREATE TABLE `registered_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`);



ALTER TABLE `registered_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;