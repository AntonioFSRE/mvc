/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `product_applications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliverytime` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photoname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` datetime NOT NULL,
  `currency_id` int DEFAULT NULL,
  `starting_price` int NOT NULL,
  `status_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7A6D449B38248176` (`currency_id`),
  KEY `IDX_7A6D449B6BF700BD` (`status_id`),
  CONSTRAINT `FK_7A6D449B38248176` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`),
  CONSTRAINT `FK_7A6D449B6BF700BD` FOREIGN KEY (`status_id`) REFERENCES `product_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_applications` (`id`, `product_name`, `description`, `deliverytime`, `photoname`, `expires_at`, `currency_id`, `starting_price`, `status_id`) VALUES
(42, 'Amfore', 'stare grčke amfore', '3 dana', 'amfore (1)jpg', '2021-12-30 15:14:00', 47, 20000, 3);
INSERT INTO `product_applications` (`id`, `product_name`, `description`, `deliverytime`, `photoname`, `expires_at`, `currency_id`, `starting_price`, `status_id`) VALUES
(44, 'Car Dodge Charger', 'Classic car', '10 days', '1edeef158136694ccf5e433cdb1ac78ajpg', '2021-12-28 19:31:24', 45, 1000000, 3);
INSERT INTO `product_applications` (`id`, `product_name`, `description`, `deliverytime`, `photoname`, `expires_at`, `currency_id`, `starting_price`, `status_id`) VALUES
(45, 'Classic Motorcycle', 'Classic Motorycyle', '7 days', 'classic motorcycle designjpg', '2021-12-27 20:08:27', 44, 500000, 3);
INSERT INTO `product_applications` (`id`, `product_name`, `description`, `deliverytime`, `photoname`, `expires_at`, `currency_id`, `starting_price`, `status_id`) VALUES
(46, 'Antique sofa', 'Vintage furniture', '3 days', 'antiquesofajpg', '2021-12-29 20:10:13', 49, 20000, 3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;