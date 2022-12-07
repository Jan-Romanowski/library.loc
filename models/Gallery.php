<?php

class Gallery{

	/**
	 * @return array
	 */
	public static function getFolders()
	{

		$db = Db::getConnection();

		$galleryList = array();

		$result = $db->query("SELECT id, name, date 
                        FROM gallery 
                        ORDER BY date");

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$i = 0;
		while ($row = $result->fetch()) {
			$galleryList[$i]['id'] = $row['id'];
			$galleryList[$i]['name'] = $row['name'];
			$galleryList[$i]['date'] = $row['date'];

			$i++;
		}
		return $galleryList;

	}

	public static function checkName($name)
	{
		if (strlen($name) > 4) {
			return true;
		}
		return false;
	}

	/**
	 * @param $name
	 * @return bool
	 */
	public static function addFolder($name){

		$db = Db::getConnection();

		$sql = 'INSERT INTO gallery (name)'
			. 'VALUES (:name)';

		$result = $db->prepare($sql);
		$result->bindParam(':name', $name, PDO::PARAM_STR);

		try {
			return $result->execute();
		} catch (Exception $e) {
			return false;
		}

	}


	/**
	 * @param $id
	 * @return bool
	 */
	public static function isFolderEmpty($id)
	{

		$dir = ROOT . '/public_html/gallery/' . $id;

		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (false !== ($file = readdir($dh))) {
					if ($file != "." && $file != "..") {
						return false;
					}
				}
			}
		}

		return true;

	}


	public static function getFolderById($id)
	{
		$id = intval($id);

		if ($id) {

			$db = Db::getConnection();

			$result = $db->query('
            SELECT id, name, date 
            FROM gallery 
            WHERE id = ' . $id);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$folder = $result->fetch();

			return $folder;
		}
	}

}