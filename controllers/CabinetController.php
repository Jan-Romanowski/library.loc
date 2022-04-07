<?php

class CabinetController
{

	/**
	 * @return bool
	 */
	function actionIndex()
	{
		User::checkRights("user");

		if (isset($_POST['submit_pass'])) {

			$old_pass = Get::post('old_pass', '');
			$new_pass1 = Get::post('new_pass1', '');
			$new_pass2 = Get::post('new_pass2', '');

			$errors_pass = false;

			if (!User::isGoodPassword($old_pass))
				$errors_pass[] = "Nieprawidłowe stare hasło";

			if (!User::chekPassword($new_pass1))
				$errors_pass[] = "Hasło ma być nie krótrze niż 6 symboli";

			if (!User::chekPasswords($new_pass1, $new_pass2))
				$errors_pass[] = "Hasła nie są jednakowe";

			if ($errors_pass == false) {
				if (User::changePassword($new_pass1)) ;
				$_SESSION["msg"] = "Hasło zostało pomyślnie zmienione";
				$_SESSION["stat"] = "alert-success";
			}
		} else if (isset($_POST['submit_data'])) {

			$email = Get::post('mail', '');
			$name = Get::post('name', '');
			$surname = Get::post('surname', '');

			$errors_data = false;

			if (User::checkEmailExists($email))
				$errors_data[] = "Taki email już jest zajęty";

			if (!User::checkName($name))
				$errors_data[] = "Nieprawidłowe imię";

			if (!User::chekSurname($surname))
				$errors_data[] = "Nieprawidłowe nazwisko";

			if ($errors_data == false) {
				if (User::changeData($name, $surname, $email)) {
					$_SESSION["msg"] = "Dane zostały pomyślnie zmienione. Zaloguj się ponownie, aby zmiany zaczęły obowiązywać";
					$_SESSION["stat"] = "alert-success";
				}
			}
		}

		require_once ROOT . '/views/cabinet/index.php';

		return true;
	}
}
