<?php
# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    mg0001_creating_user_table.php                     :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: magoumi <agoumi.mohamed@outlook.com>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/03/21 19:05:23 by magoumi           #+#    #+#              #
#    Updated: 2021/03/21 19:05:23 by magoumi          ###   ########lyon.fr    #
#                                                                              #
# **************************************************************************** #

class mg0001_creating_user_table
{
	public function up()
	{
		$db = Application::$APP->db;

		$db->pdo->exec("CREATE TABLE users(
							id INT AUTO_INCREMENT PRIMARY KEY,
							email VARCHAR(255) NOT NULL,
							name VARCHAR(255),
							password VARCHAR(255),
							status TINYINT NOT NULL,
							created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
						) ENGINE=INNODB");
	}

	public function down()
	{
		$db = Application::$APP->db;

		$db->pdo->exec("DROP TABLE users");
	}
}