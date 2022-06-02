<?php

class QueriesController
{

	/**
	 * @return bool
	 */
	function actionQueriesView()
	{

		User::checkRights("moder");

		$queriesList = array();
		$queriesList = Queries::getQueries();

		require_once(ROOT . '/views/queries/index.php');

		return true;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	function actionDeleteQuery($id)
	{

		User::checkRights("moder");

		if ($id) {
			if (Queries::deleteQuery($id)) {
				$_SESSION["msg"] = "Wniosek został pomyślnie usunięty";
				$_SESSION["stat"] = "alert-success";
			} else {
				$_SESSION["msg"] = "Coś poszło nie tak..";
				$_SESSION["stat"] = "alert-danger";
			}
		}

		header('Location: /queries/');

		return true;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	function actionTransferQuery($id)
	{

		User::checkRights("moder");

		$ac_type = Get::post('ac_type', '');

		$query = array();
		$query = Queries::getQueryById($id);

		if (Queries::transferQuery($id, $ac_type)) {

			$subject = "Rejestracja w bibliotece Chóru Katedralnego im. ks. Alfreda Hoffmana";
			$message = "Witaj, ".$query['name']."! Twój wniosek o rejestrację w bibliotece Chóru Katedralnego im. ks. Alfreda Hoffmana w Siedlcach został zaakceptowany. Już możesz się zalogować do systemu. \n\n\n\nZdrówka\nAdministracja Systemu";

			ComFun::sendMail($query['email'], $message, $subject);

			$_SESSION["msg"] = "Użytkownik został pomyślnie dodany do biblioteki";
			$_SESSION["stat"] = "alert-success";
			header('Location: /users/view');

		} else {
			$_SESSION["msg"] = "Coś poszło nie tak..";
			$_SESSION["stat"] = "alert-danger";
			header('Location: /queries');
		}
		return true;
	}


}
