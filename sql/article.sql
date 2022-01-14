CREATE TABLE `article` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `count_view` int(11) DEFAULT 0,
  `created` timestamp not null default current_timestamp,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

