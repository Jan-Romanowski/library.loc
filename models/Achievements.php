<?php

class achievements{

	/**
	 * @return array
	 */
	public static function getAchievements(){
		$db = Db::getConnection();

		$achievementsList = array();

		$result = $db->query("SELECT id, text
                        FROM achievements 
                        ORDER BY id");


		$result->setFetchMode(PDO::FETCH_ASSOC);

		$i = 0;
		while ($row = $result->fetch()) {
			$achievementsList[$i]['id'] = $row['id'];
			$achievementsList[$i]['text'] = $row['text'];

			$i++;
		}
		return $achievementsList;
	}



}
