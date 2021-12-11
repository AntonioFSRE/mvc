/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `offer_applications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `offer` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `time` datetime NOT NULL,
  `currency_id` int DEFAULT NULL,
  `status_id` int DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_10F0694B4584665A` (`product_id`),
  KEY `IDX_10F0694B38248176` (`currency_id`),
  KEY `IDX_10F0694B6BF700BD` (`status_id`),
  KEY `IDX_10F0694BA76ED395` (`user_id`),
  CONSTRAINT `FK_10F0694B38248176` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`),
  CONSTRAINT `FK_10F0694B4584665A` FOREIGN KEY (`product_id`) REFERENCES `product_applications` (`id`),
  CONSTRAINT `FK_10F0694B6BF700BD` FOREIGN KEY (`status_id`) REFERENCES `offer_status` (`id`),
  CONSTRAINT `FK_10F0694BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `offer_applications` (`id`, `offer`, `product_id`, `time`, `currency_id`, `status_id`, `user_id`) VALUES
(49, 1500, 42, '2021-10-10 18:33:41', 47, 6, 24);
INSERT INTO `offer_applications` (`id`, `offer`, `product_id`, `time`, `currency_id`, `status_id`, `user_id`) VALUES
(50, 2000, 44, '2021-10-10 18:41:58', 45, 5, 29);
INSERT INTO `offer_applications` (`id`, `offer`, `product_id`, `time`, `currency_id`, `status_id`, `user_id`) VALUES
(51, 5000, 42, '2021-10-10 19:31:48', 47, 5, 29);
INSERT INTO `offer_applications` (`id`, `offer`, `product_id`, `time`, `currency_id`, `status_id`, `user_id`) VALUES
(52, 30000, 44, '2021-10-17 14:36:16', 45, 6, 24),
(53, 1222200, 44, '2021-12-10 14:40:46', 45, 4, 31);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;