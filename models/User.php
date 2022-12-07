<?php

class User
{


	/**
	 * @param $name
	 * @param $surname
	 * @param $email
	 * @param $pass1
	 * @return bool
	 */
	public static function register($name, $surname, $email, $pass1)
	{
		$db = Db::getConnection();

		$sql = 'INSERT INTO queries (email, ac_password, name, surname)'
			. 'VALUES (:email, MD5(:ac_password), :name, :surname)';

		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':surname', $surname, PDO::PARAM_STR);
		$result->bindParam(':ac_password', $pass1, PDO::PARAM_STR);

		return $result->execute();

	}

	/**
	 * @param $name
	 * @return bool
	 */
	public static function checkName($name)
	{
		if (strlen($name) >= 3) {
			return true;
		}
		return false;
	}

	/**
	 * @param $surname
	 * @return bool
	 */
	public static function chekSurname($surname)
	{
		if (strlen($surname) >= 3) {
			return true;
		}
		return false;
	}

	/**
	 * @param $email
	 * @return bool
	 */
	public static function chekEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}

	/**
	 * @param $pass1
	 * @param $pass2
	 * @return bool
	 */
	public static function chekPasswords($pass1, $pass2)
	{
		if (strcasecmp($pass1, $pass2) == 0) {
			return true;
		}
		return false;
	}

	/**
	 * @param $pass1
	 * @return bool
	 */
	public static function chekPassword($pass1)
	{
		/*if(strlen($pass1)>=6 && ){
				return true;
		}
		return false; */

		$errors = false;

		if (strlen($pass1) < 8) {
			$errors[] = "Password too short!";
		}

		if (!preg_match("#[0-9]+#", $pass1)) {
			$errors[] = "Password must include at least one number!";
		}

		if (!preg_match("#[a-zA-Z]+#", $pass1)) {
			$errors[] = "Password must include at least one letter!";
		}

		if ($errors) {
			return false;
		}
		return true;
	}

	/**
	 * @param $email
	 * @return bool
	 */
	public static function checkEmailExists($email)
	{

		$db = Db::getConnection();

		$result = $db->query("SELECT COUNT(*) as cnt FROM accounts 
                								    WHERE email = '$email'");

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$row = $result->fetch();

		echo $row['cnt'];

		if ($row['cnt'] > 0)
			return true;
		else {
			return false;
		}
	}

	/**
	 * @return array
	 */
	public static function getUsers($word)
	{
		$db = Db::getConnection();

		$userList = array();

		$result = $db->query("SELECT id_account, email, name, surname, ac_type, last_online, regist_date
                                       FROM accounts 
																		WHERE (name LIKE '%" . $word . "%' OR surname LIKE '%" . $word . "%')
                             				ORDER BY last_online DESC;
                             ");

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$i = 0;
		while ($row = $result->fetch()) {
			$userList[$i]['id_account'] = $row['id_account'];
			$userList[$i]['email'] = $row['email'];
			$userList[$i]['name'] = $row['name'];
			$userList[$i]['surname'] = $row['surname'];
			$userList[$i]['ac_type'] = $row['ac_type'];
			$userList[$i]['last_online'] = $row['last_online'];
			$userList[$i]['regist_date'] = $row['regist_date'];

			$i++;
		}

		return $userList;
	}

	/**
	 * @param $email
	 * @param $pass
	 * @return false|mixed
	 */
	public static function checkUserData($email, $pass)
	{
		$db = Db::getConnection();

		$userData = array();

		$SQL = "SELECT * FROM accounts 
                WHERE email = '$email'
                AND ac_password = MD5('$pass')";
		$result = $db->query($SQL);

		$result->setFetchMode(PDO::FETCH_ASSOC);

		while ($row = $result->fetch()) {
			$userData['id_account'] = $row['id_account'];
			$userData['name'] = $row['name'];
			$userData['surname'] = $row['surname'];
			$userData['email'] = $row['email'];
			$userData['ac_type'] = $row['ac_type'];
		}

		if ($userData) {
			return $userData;
		}

		return false;
	}

	/**
	 * @param $pass
	 * @return bool
	 */
	public static function isGoodPassword($pass)
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM accounts WHERE ac_password = MD5(:pas) AND id_account = :id;';

		$result = $db->prepare($sql);
		$result->bindParam(':pas', $pass, PDO::PARAM_STR);
		$result->bindParam(':id', $_SESSION['user'], PDO::PARAM_STR);
		$result->execute();

		if ($result->fetchColumn())
			return true;

		return false;
	}

	/**
	 * @param $pass
	 * @return bool
	 */
	public static function changePassword($pass)
	{

		$db = Db::getConnection();
		$id = $_SESSION['user'];

		$sql = "UPDATE accounts 
            SET 
                ac_password = MD5('$pass')
            WHERE id_account = '$id'";

		$result = $db->prepare($sql);

		return $result->execute();

	}

	/**
	 * @param $name
	 * @param $surname
	 * @param $email
	 * @return bool
	 */
	public static function changeData($name, $surname, $email)
	{

		$db = Db::getConnection();
		$id = $_SESSION['user'];

		$sql = "UPDATE accounts 
            SET 
                name = '$name',
                surname = '$surname',
                email = '$email'
            WHERE id_account = '$id'";

		$result = $db->prepare($sql);

		return $result->execute();
	}

	/**
	 * @param $id
	 * @param $rights
	 * @return bool
	 */
	public static function changeRights($id, $rights)
	{
		$db = Db::getConnection();

		$sql = "UPDATE accounts 
            SET 
                ac_type = '$rights'
            WHERE id_account = '$id'";

		$result = $db->prepare($sql);

		return $result->execute();
	}


	/** Проверяет права, если прав нет - смерть
	 * @param $rank
	 * @return bool|void
	 */
	public static function checkRights($rank){

		if (User::isLogin()) {

			$neededRoot = $rank;
			$currentRoot = $_SESSION['ac_type'];

			switch ($neededRoot){
				case 'user':
					if(strcasecmp($currentRoot, "user") == 0 || strcasecmp($currentRoot, "moder") || strcasecmp($currentRoot, "admin"))
						return true;
					break;
				case 'moder':
					if(strcasecmp($currentRoot, "admin") == 0 || strcasecmp($currentRoot, "moder") == 0)
						return true;
					break;
				case 'admin':
					if(strcasecmp($currentRoot, "admin") == 0)
						return true;
						break;
				default:
					self::logout();
					return false;
			}
		}
		else if(!User::isLogin()){
			self::logout();
		}
		else{
			self::logout();
		}
		self::logout();
	}

	/** Возвращает true или false в зависимости залогинен ты или нет
	 * @return bool
	 */
	public static function isLogin()
	{
		if (isset($_SESSION['user']) || isset($_SESSION['ac_type'])) {
			return true;
		}
		return false;
	}


	/**
	 * @return bool
	 */
	public static function isModerator()
	{
		if (self::isLogin()) {
			if (strcasecmp($_SESSION['ac_type'], "moder") == 0 ||
				strcasecmp($_SESSION['ac_type'], "admin") == 0) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @return bool
	 */
	public static function isAdmin()
	{
		if (self::isLogin()) {
			if (strcasecmp($_SESSION['ac_type'], "admin") == 0)
				return true;
		}
		return false;
	}


	public static function checkRoot($root)
	{
		if(!self::isLogin()){
			return false;
		}
		if (strcasecmp($_SESSION['ac_type'], $root) == 0)
			return true;
		return false;
	}

	/**
	 * @param $userData
	 */
	public static function auth($userData)
	{
		$_SESSION['user'] = $userData['id_account'];
		$_SESSION['name'] = $userData['name'];
		$_SESSION['surname'] = $userData['surname'];
		$_SESSION['email'] = $userData['email'];
		$_SESSION['ac_type'] = $userData['ac_type'];
		$_SESSION["multiVoise"] = true;
		$_SESSION["oneVoise"] = true;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	public static function deleteUser($id)
	{
		$db = Db::getConnection();

		$sql = "DELETE FROM accounts
                WHERE id_account = '$id'";

		$result = $db->prepare($sql);

		return $result->execute();
	}


	/**
	 * @param $id
	 * @return bool
	 */
	public static function refreshOnline($id){

		$db = Db::getConnection();

		$now = date("Y-m-d H:i:s");

		$sql = "UPDATE accounts 
            SET 
                last_online = '$now'
            WHERE id_account = '$id'";

		$result = $db->prepare($sql);

		return $result->execute();

	}

	public static function logout(){

		session_unset();
		session_destroy();
		header("Location: /users/login");

		exit();

	}

}