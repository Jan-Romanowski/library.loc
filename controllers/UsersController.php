<?php

class UsersController
{

	/** Registration new User
	 * @return bool
	 */
	public function actionRegister()
	{

		$name = '';
		$surname = '';
		$email = '';
		$pass1 = '';
		$pass2 = '';

		if (isset($_POST['submit']) && !empty($_POST['submit'])) {

			$name = Get::post('name', '');
			$surname = Get::post('surname', '');
			$email = Get::post('email', '');
			$pass1 = Get::post('pass1', '');
			$pass2 = Get::post('pass2', '');

			$errors = false;

			if (!User::checkName($name))
				$errors[] = 'Imię nie może być takie krótkie.';

			if (!User::chekSurname($surname))
				$errors[] = 'Nazwisko nie może być takie krótkie.';

			if (!User::chekEmail($email))
				$errors[] = 'Nieprawidłowy Email';

			if (!User::chekPasswords($pass1, $pass2))
				$errors[] = 'Hasła nie są jednakowe';

			if (!User::chekPassword($pass1))
				$errors[] = 'Nieprawidłowe hasło';

			if (User::checkEmailExists($email))
				$errors[] = 'Taki email już jest zajęty.';

			if (Queries::isQueryExist($email))
				$errors[] = 'Już złóżyłeś wniosek o rejestracje, musisz poczekać na akceptację administratora.';

			if ($errors == false) {

				if(!Queries::isQueryExist($email)) {
					if (User::register($name, $surname, $email, $pass1)) {

						$_SESSION["msg"] = "Wniosek o rejestrację został złożony. Poczekaj na zaakceptowanie danych przez administratora.";
						$_SESSION["stat"] = "alert-success";

						$subject = "Rejestracja w bibliotece Chóru Katedralnego im. ks. Alfreda Hoffmana";
						$message = "Witaj, ".$name."! Złożyłeś(aś) wniosek o rejestrację w bibliotece Chóru Katedralnego im. ks. Alfreda Hoffmana w Siedlcach. Musisz poczekać na akceptację przez administratorów systemu. Po akceptacji dostaniesz maila. \n\n\n\nZdrówka\nAdministracja Systemu";

						ComFun::sendMail($email, $message, $subject);

						header("Location: /users/login");

						$name = '';
						$surname = '';
						$email = '';
						$pass1 = '';
						$pass2 = '';

					} else {
						$_SESSION["msg"] = "Nie udało się założyć konta.";
						$_SESSION["stat"] = "alert-danger";
					}
				}
				else{
					$_SESSION["msg"] = "Wniosek o rejestrację został złożony. Poczekaj na zaakceptowanie danych przez administratora. ";
					$_SESSION["stat"] = "alert-danger";
				}
			}

		}

		require_once(ROOT . '/views/user/register.php');

		return true;
	}


	/**
	 * @return bool
	 */
	public function actionLogin()
	{

		$email = '';
		$pass = '';

		if (isset($_POST['submit'])) {

			$email = Get::post('email', '');
			$pass = Get::post('pass', '');

			$errors = false;

			if (!User::chekEmail($email))
				$errors[] = 'Nieprawidłowy email';

			if (!User::chekPassword($pass))
				$errors[] = 'Hasło ma być nie któtrze niż 6 symboli';

			$userData = array();
			$userData = User::checkUserData($email, $pass);

			if ($userData == false) {
				$errors[] = 'Nieprawidłowe dane dla logowania';
			} else {
				User::auth($userData);
				header("Location: /songs");
			}

		}

		require_once(ROOT . '/views/user/login.php');

		return true;
	}

	/**
	 * @return bool
	 */
	public function actionView()
	{

		User::checkRights("moder");

		if (isset($_POST['submit'])) {
			$word = Get::post('word', '');
		}
		else{
			$word = '';
		}

		$userList = array();
		$userList = User::getUsers($word);


		require_once(ROOT . '/views/user/userList.php');

		return true;

	}

	/**
	 * @return bool
	 */
	public function actionLogout()
	{
		User::logout();
		return true;
	}

	/**
	 * @param $id
	 * @param $rights
	 * @return bool
	 */
	public function actionChangeRights($id, $rights)
	{

		User::checkRights("admin");

		if ($id && $rights) {
			if (User::changeRights($id, $rights)) {
				$_SESSION["msg"] = "Uprawnienia zostały pomyślnie zmienione.";
				$_SESSION["stat"] = "alert-success";
			} else {
				$_SESSION["msg"] = "Nie udało się zmienić uprawnień.";
				$_SESSION["stat"] = "alert-danger";
			}
		}

		header("Location: /users/view/");

		return true;
	}

	public function actionDeleteUser($id)
	{
		User::checkRights("admin");

		if ($id) {
			if (User::deleteUser($id)) {
				$_SESSION["msg"] = "Konto zostało usunięte.";
				$_SESSION["stat"] = "alert-success";
				header("Location: /users/view/");
			}
		}

		return true;
	}

}
