<?php

class Chat{


	/**
	 * @return array
	 */
	public static function getMessages()
	{

		$db = Db::getConnection();

		$messages = array();

		$result = $db->query('
					SELECT id, chat.id_account, message, datetime, accounts.name, accounts.surname, accounts.ac_type
					FROM chat 
						LEFT JOIN accounts ON chat.id_account = accounts.id_account');
		$result->setFetchMode(PDO::FETCH_ASSOC);

		$i = 0;
		while ($row = $result->fetch()) {
			$messages[$i]['id'] = $row['id'];
			$messages[$i]['id_account'] = $row['id_account'];
			$messages[$i]['message'] = $row['message'];
			$messages[$i]['datetime'] = $row['datetime'];
			$messages[$i]['name'] = $row['name'];
			$messages[$i]['surname'] = $row['surname'];
			$messages[$i]['ac_type'] = $row['ac_type'];

			$i++;
		}
		return $messages;

	}


	/**
	 * @param $id_account
	 * @param $message
	 * @return bool
	 */
	public static function addMessage($id_account, $message){

		$db = Db::getConnection();

		$sql = 'INSERT INTO chat(id_account, message)
            values (:id_account, :message)';

		$result = $db->prepare($sql);
		$result->bindParam(':id_account', $id_account, PDO::PARAM_INT);
		$result->bindParam(':message', $message, PDO::PARAM_STR);

		return $result->execute();

	}


	/**
	 * @param $message
	 * @return bool
	 */
	public static function checkMessage($message){

		if (strlen($message) > 0) {
			return true;
		}
		return false;

	}


	/**
	 * @param $id
	 * @return mixed|void
	 */
	public static function isNewMessagesExists($id){

		$db = Db::getConnection();

		if($id){
			$result = $db->query("SELECT COUNT(*) as res
                                       FROM chat
                                       WHERE id > '$id';");

			$result->setFetchMode(PDO::FETCH_ASSOC);

			$row = $result->fetch();

			return $row['res'];
		}

	}


	/**
	 * @param $id
	 * @return array
	 */
	public static function getNewMessages($id){

		$db = Db::getConnection();

		$messages = array();

		$result = $db->query("
					SELECT id, chat.id_account, message, datetime, accounts.name, accounts.surname, accounts.ac_type
					FROM chat 
						LEFT JOIN accounts ON chat.id_account = accounts.id_account
						WHERE id > '$id'");

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$i = 0;
		while ($row = $result->fetch()) {
			$messages[$i]['id'] = $row['id'];
			$messages[$i]['id_account'] = $row['id_account'];
			$messages[$i]['message'] = $row['message'];
			$messages[$i]['datetime'] = $row['datetime'];
			$messages[$i]['name'] = $row['name'];
			$messages[$i]['surname'] = $row['surname'];
			$messages[$i]['ac_type'] = $row['ac_type'];

			$i++;
		}
		return $messages;

	}

}
