<?php

class EmailController{

	/**
	 * @return bool
	 */
	public function actionIndex(){

		User::checkRights("moder");

		$templatesList = array();
		$templatesList = Email::getTemplates();

		require_once(ROOT . '/views/email/index.php');

		return true;

	}


	/**
	 * @return bool
	 */
	public function actionNewTemplate($parameter){

		User::checkRights("moder");

		$header = ' ';
		$text = ' ';

		switch ($parameter){
			case '1':

				$header = " Nowe aktualne utwory";
				$text = " ";
				$text = ComFun::generateActual();

				break;
			default:

				$header = ' ';
				$text = ' ';

				break;

		}

		if (isset($_POST['submit']) && !empty($_POST['submit'])) {

			$header = Get::post('header', '');
			$text = Get::post('text', '');

			$errors = false;

			if (!Email::checkHeader($header))
				$errors[] = 'Ilość symboli w polu Temat się nie zgadza.';

			if (!Email::checkText($text))
				$errors[] = 'Ilość symboli w polu Treść się nie zgadza.';

			if ($errors == false) {
				if(Email::addNewTemplate($header, $text)){
					$_SESSION["msg"] = "Nowy szablon został pomyślnie dodany do bazy danych!";
					$_SESSION["stat"] = "alert-success";
				}
				else{
					$_SESSION["msg"] = "Coś poszło nie tak..";
					$_SESSION["stat"] = "alert-danger";
				}
			}
		}

		require_once(ROOT . '/views/email/emailForm.php');

		return true;

	}


	public function actionEditTemplate($id, $parameter){

		User::checkRights("moder");

		$temp = true;

		$templateItem = array();
		$templateItem = Email::getTemplateById($id);

		switch ($parameter){
			case '1':

				$header = " Nowe aktualne utwory";
				$text = " ";
				$text = ComFun::generateActual();

				break;
			case '2':

				$header = ' ';
				$text = ' ';

				break;
			default:

				$header = $templateItem['header'];
				$text = $templateItem['text'];

				break;

		}

		if (isset($_POST['submit']) && !empty($_POST['submit'])) {

			$header = Get::post('header', '');
			$text = Get::post('text', '');

			$errors = false;

			if (!Email::checkHeader($header))
				$errors[] = 'Ilość symboli w polu Temat się nie zgadza.';

			if (!Email::checkText($text))
				$errors[] = 'Ilość symboli w polu Treść się nie zgadza.';

			if ($errors == false) {
				if(Email::editTemplate($id, $header, $text)){
					$_SESSION["msg"] = "Nowy szablon został pomyślnie dodany do bazy danych!";
					$_SESSION["stat"] = "alert-success";
				}
				else{
					$_SESSION["msg"] = "Coś poszło nie tak..";
					$_SESSION["stat"] = "alert-danger";
				}
			}
		}

		require_once(ROOT . '/views/email/emailForm.php');

		return true;

	}


	public function actionDeleteTemplate($id){

		User::checkRights("moder");

		if($id){
			if(Email::deleteTemplateById($id)){
				$_SESSION["msg"] = "Szablon pomyślnie usunięty.";
				$_SESSION["stat"] = "alert-success";
				header('Location: /email/index/');
			}
			else{
				$_SESSION["msg"] = "Coś poszło nie tak..";
				$_SESSION["stat"] = "alert-danger";
			}
		}

		return true;
	}

}
