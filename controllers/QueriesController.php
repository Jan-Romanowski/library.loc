<?php

class QueriesController
{

	/**
	 * @return bool
	 */
	function actionQueriesView()
	{

		User::isModerator();

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

		User::isModerator();

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

		User::isModerator();

		$ac_type = Get::post('ac_type', '');

		if (Queries::transferQuery($id, $ac_type)) {
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
