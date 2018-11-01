<?php
	include("database.php");


	$db = new PDO('mysql:host=localhost', $DB_USER, $DB_PASSWORD);
	$req = "CREATE DATABASE IF NOT EXISTS CAM";
	$db->prepare($req)->execute();

	try {
		$con = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con->query("
				CREATE TABLE IF NOT EXISTS `photos` (
 				`id` int(11) NOT NULL AUTO_INCREMENT,
 				`id_user` int(11) NOT NULL,
 				`created` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
				 PRIMARY KEY (`id`)
				);
				CREATE TABLE IF NOT EXISTS `users` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
 				`first_name` varchar(255) NOT NULL,
				`last_name` varchar(255) NOT NULL,
				`username` varchar(255) NOT NULL,
				`email` varchar(320) CHARACTER SET ascii NOT NULL,
				`password` text NOT NULL,
 				`validation_code` text NOT NULL,
 				`active` tinyint(4) NOT NULL DEFAULT '0',
				PRIMARY KEY (`id`)
				);
				CREATE TABLE IF NOT EXISTS `comments` (
				 `id` int(11) NOT NULL AUTO_INCREMENT,
				 `id_user` int(11) NOT NULL,
				 `id_photo` int(11) NOT NULL,
 				`content` text NOT NULL,
 				`created` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
				 PRIMARY KEY (`id`)
				);
			");
		if (!($con->query("SELECT * FROM `users` WHERE `email` = 'alrick@hotmail.fr' OR `email` = 'seliasbe@student.42.fr'")->fetch()))
		{
			$con->query("
				INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `validation_code`, `active`) VALUES (NULL, 'alrick', 'eymauzy', 'askerto', 'alrick@hotmail.fr', '2891284b993a6bdde032d0f844bf2abde4502c149846588f9d7c4a21c761e01ff716cc03fc145d225068ccba6bd2954973eb912e287b511b798a10f764bcf946', '2654132645', '0');
				INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `validation_code`, `active`) VALUES (NULL, 'sofian', 'elisabeth', 'seliasbe', 'seliasbe@student.42.fr', '1a37fb53d33b0b878258aea0abcf2e63497c3866087b5a75b6bb6b094ca2711581a3c68e6d72dcbde7414ccea7ead0d26e500f9d52ce48af0a1b3e5786c5937f', '2674135', '0');
				INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `validation_code`, `active`) VALUES (NULL, 'admin', 'admin', 'admin', 'admin@admin.fr', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', '6286532', '0');
				INSERT INTO `photos` (`id`, `id_user`, `created`) VALUES (NULL, '2', '2018-04-25 10:31:22');
				INSERT INTO `photos` (`id`, `id_user`, `created`) VALUES (NULL, '1', '2018-04-16 00:00:00');
				INSERT INTO `photos` (`id`, `id_user`, `created`) VALUES (NULL, '3', '2018-04-25 15:30:29');
				INSERT INTO `comments` (`id`, `id_user`, `id_photo`, `content`, `created`) VALUES (NULL, '3', '2', 'bg', '2018-04-19 10:28:32');
				INSERT INTO `comments` (`id`, `id_user`, `id_photo`, `content`, `created`) VALUES (NULL, '5', '3', 'sale gueule', '2018-04-10 09:24:25');
				INSERT INTO `comments` (`id`, `id_user`, `id_photo`, `content`, `created`) VALUES (NULL, '3', '4', 'merci', '2018-04-12 09:27:22');
			");
		}
	} catch (PDOException $e) {
		var_dump($e->getMessage());
	}
 ?>
