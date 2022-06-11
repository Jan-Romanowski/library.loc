<?php

class Email{


	/**
	 * @return array
	 */
	public static function getTemplates(){

		$db = Db::getConnection();

		$templatesList = array();

		$result = $db->query("SELECT id, header, text 
                        				 	  FROM mails");

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$i = 0;
		while ($row = $result->fetch()) {
			$templatesList[$i]['id'] = $row['id'];
			$templatesList[$i]['header'] = $row['header'];
			$templatesList[$i]['text'] = $row['text'];
			$i++;
		}

		return $templatesList;

	}


	/**
	 * @param $header
	 * @return bool
	 */
	public static function checkHeader($header)
	{
		if (strlen($header) > 5 && strlen($header) < 31) {
			return true;
		}
		return false;
	}


	/**
	 * @param $text
	 * @return bool
	 */
	public static function checkText($text)
	{
		if (strlen($text) > 5 && strlen($text) < 2501) {
			return true;
		}
		return false;
	}

	/**
	 * @param $header
	 * @param $text
	 * @return bool
	 */
	public static function addNewTemplate($header, $text){

			$db = Db::getConnection();

			$sql = 'INSERT INTO mails(header, text)
            values (:header, :text)';

			$result = $db->prepare($sql);
			$result->bindParam(':header', $header, PDO::PARAM_STR);
			$result->bindParam(':text', $text, PDO::PARAM_STR);

			return $result->execute();

	}


	/**
	 * @param $id
	 * @param $header
	 * @param $text
	 * @return bool
	 */
	public static function editTemplate($id, $header, $text){

		$db = Db::getConnection();

		$sql = "UPDATE mails 
            SET 
                header = '$header', 
                text = '$text'

            WHERE id = '$id'";

		$result = $db->prepare($sql);

		return $result->execute();

	}


	/**
	 * @param $id
	 * @return mixed|void
	 */
	public static function getTemplateById($id)
	{
		$id = intval($id);

		if ($id) {

			$db = Db::getConnection();

			$result = $db->query('
            SELECT id, header, text
            FROM mails 
            WHERE id = ' . $id);

			$result->setFetchMode(PDO::FETCH_ASSOC);

			$template = $result->fetch();

			return $template;
		}
	}


	public static function deleteTemplateById($id){

		$id = intval($id);

		if ($id) {

			$db = Db::getConnection();

			$sql = "DELETE FROM mails
                WHERE id = '$id'";

			$result = $db->prepare($sql);

			return $result->execute();

		}

	}

}
