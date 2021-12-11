/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `roles` json NOT NULL,
  `first_name` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`),
  UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `is_active`, `roles`, `first_name`, `last_name`, `address`) VALUES
(23, 'admin', '$2y$13$gCpanMXT4dOqOucBj/ld4u78slBmKYfpKLHrV2nDp6MRiZRj38d9a', 'admin@gmail.com', 1, '[\"ROLE_ADMIN\"]', 'antonio', 'markic', 'Mostar 88000');
INSERT INTO `users` (`id`, `username`, `password`, `email`, `is_active`, `roles`, `first_name`, `last_name`, `address`) VALUES
(24, 'korisnik', '$2y$13$FUi52G5fOU8C69MMXfuHhO2QmbEkzweJMP82qojL/zJl3YIuuVIKS', 'korisnik@gmail.com', 1, '[\"ROLE_USER\"]', 'kor', 'user', 'BiH bb');
INSERT INTO `users` (`id`, `username`, `password`, `email`, `is_active`, `roles`, `first_name`, `last_name`, `address`) VALUES
(27, 'jure', '$2y$13$NuCFGvOyVBdijHS8Dzy4VeaJ8cMzGpbt5g3jaG6xV5hHIW6tNEkFC', 'jure@mail.com', 1, '[\"ROLE_USER\"]', 'Jure', 'Neki', 'Mostar');
INSERT INTO `users` (`id`, `username`, `password`, `email`, `is_active`, `roles`, `first_name`, `last_name`, `address`) VALUES
(28, 'novi', '$2y$13$n/BDZrYE2kJaMDJOI9Y/Kesf0hUkg//hFmE3akH7TqGvMi43rfC9e', 'novi@mail.com', 1, '[\"ROLE_USER\"]', 'Novi', 'kor', 'Mostar'),
(29, 'josip', '$2y$13$/18jM8BIscW2FNJ64kNWg.m9vtjLiITRjXjVjduBNh/c.b3MwPxy2', 'josip@mail.com', 1, '[\"ROLE_USER\"]', 'josip', 'josipovic', 'Mostar 88000 BiH'),
(30, 'karlo', '$2y$13$qTCgxzc0d8iTLgbD8xzoZOrB44c0dJQ/vyI6n3n/Ml5VXwCifluD6', 'karlo@mail.com', 1, '[\"ROLE_ADMIN\"]', 'karlo', 'karlic', 'Mostar 88000 Bih'),
(31, 'ivo', '$2y$13$7NqylcY4chlfOvNTAQiAlu12.4ttZ/2laNqVnFdbOoZaL2N8XZeJe', 'ivo@mail.com', 1, '[\"ROLE_USER\"]', 'ivo', 'ivic', 'mostar 8800');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;