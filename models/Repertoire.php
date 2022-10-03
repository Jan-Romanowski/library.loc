<?php

class Repertoire{

	/**
	 * @return array
	 */
	public static function getRepertoireList(){

		$db = Db::getConnection();
		$repertoireList = array();

		$result = $db->query("SELECT id, header, text
                                    FROM repertoire
									   								order by id desc;");

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$i = 0;
		while ($row = $result->fetch()) {
			$repertoireList[$i]['id'] = $row['id'];
			$repertoireList[$i]['header'] = $row['header'];
			$repertoireList[$i]['text'] = $row['text'];
			$i++;
		}
		return $repertoireList;
	}

	/**
	 * @param $header
	 * @param $text
	 * @return bool
	 */
	public static function setRepertoire($header, $text){

		$db = Db::getConnection();

		$sql = 'INSERT INTO repertoire(header, text)
            values (:header, :text)';

		$result = $db->prepare($sql);
		$result->bindParam(':header', $header, PDO::PARAM_STR);
		$result->bindParam(':text', $text, PDO::PARAM_STR);

		return $result->execute();

	}

	/**
	 * @param $id
	 * @return mixed|void
	 */
	public static function getRepertoireById($id){

		$id = intval($id);

		if ($id) {

			$db = Db::getConnection();

			$result = $db->query('SELECT id, header, text
																			FROM repertoire 
																			WHERE id = ' . $id);

			$result->setFetchMode(PDO::FETCH_ASSOC);

			$repertoire = $result->fetch();

			return $repertoire;
		}

	}

	public static function editRepertoire($id, $header, $text){

		$db = Db::getConnection();

		$sql = "UPDATE repertoire 
            SET 
                header = '$header', 
                text = '$text'

            WHERE id = '$id'";

		$result = $db->prepare($sql);

		return $result->execute();

	}

	public static function deleteRepertoireById($id){

		$id = intval($id);

		if ($id) {

			$db = Db::getConnection();

			$sql = "DELETE FROM repertoire
              WHERE id = '$id'";

			$result = $db->prepare($sql);

			return $result->execute();

		}

	}

}
