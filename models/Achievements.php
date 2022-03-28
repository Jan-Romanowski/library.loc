<?php

class Achievements{

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

	/**
	 * @param $text
	 * @return bool
	 */
	public static function setNewItem($text)
	{
		$db = Db::getConnection();

		$sql = 'INSERT INTO achievements(text)
            values (:text)';

		$result = $db->prepare($sql);
		$result->bindParam(':text', $text, PDO::PARAM_STR);

		return $result->execute();

	}

	public static function deleteAchievement($id)
	{
		$db = Db::getConnection();

		$sql = "DELETE FROM achievements
                WHERE id = '$id'";

		$result = $db->prepare($sql);

		return $result->execute();
	}

}
