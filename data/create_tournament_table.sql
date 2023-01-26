-- tennis.history definition

CREATE TABLE `history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `winner` varchar(100) NOT NULL,
  `round_qty` int NOT NULL,
  `created_at` datetime NOT NULL,
  `tournament_id` tinyint NOT NULL COMMENT '1=Male, 2=Female',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;