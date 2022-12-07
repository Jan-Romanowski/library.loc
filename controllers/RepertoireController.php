<?php

class RepertoireController{

public function actionIndex(){

	User::checkRights('moder');

	$repertoireList = array();
	$repertoireList = Repertoire::getRepertoireList();

	require_once(ROOT . '/views/repertoire/index.php');

	return true;

}

public function actionNewRepertoire($parameter){

	User::checkRights("moder");

	$header = ' ';
	$text = ' ';
	$author = $_SESSION['name'] . " " . $_SESSION['surname'];

	switch ($parameter){
		case '1':

			$header = " ";
			$text = " ";
			$text = ComFun::generateActualList();

			break;
		default:

			$header = ' ';
			$text = ' ';

			break;

	}

	if (isset($_POST['submit']) && !empty($_POST['submit'])) {

		$header = Get::post('header', '');
		$text = Get::post('text', '');

		$search = ["\n"];
		$replace = ["<br>"];
		$text = str_replace($search, $replace, $text);

		$errors = false;

		if (Repertoire::checkHeader($header))
			$errors[] = 'Zadługi nagłówek (Ma byc do 100 symboli)';

		if (Repertoire::checkText($text))
			$errors[] = 'Zadługi tekst (Ma być do 3500 symboli)';

		if ($errors == false) {
			$result = Repertoire::setRepertoire($header, $text);
			$result = News::setNewsItem($header, $text, $author, true);

			$_SESSION["msg"] = 'Nowy repertuar został pomyślnie dodany do bazy danych!';
			$_SESSION["stat"] = "alert-success";
			header('Location: /repertoire/index/');

		}
	}

	require_once(ROOT . '/views/repertoire/repertoireForm.php');

	return true;

}

public function actionEditRepertoire($id, $parameter){

	User::checkRights("moder");

	$temp = true;

	$repertoire = array();
	$repertoire = Repertoire::getRepertoireById($id);

	switch ($parameter){
		case '1':

			$header = ' ';
			$text = " ";
			$text = ComFun::generateActualList();

			break;
		case '2':

			$header = ' ';
			$text = ' ';

			break;
		default:

			$header = $repertoire['header'];
			$text = $repertoire['text'];

			break;

	}

	$search = ["<br>"];
	$replace = ["\n"];
	$text = str_replace($search, $replace, $text);

	if (isset($_POST['submit']) && !empty($_POST['submit'])) {

		$header = Get::post('header', '');
		$text = Get::post('text', '');

		$search = ["\n"];
		$replace = ["<br>"];
		$text = str_replace($search, $replace, $text);

		$errors = false;

		if (Repertoire::checkHeader($header))
			$errors[] = 'Ilość symboli w polu Temat się nie zgadza.';

		if (Repertoire::checkText($text))
			$errors[] = 'Ilość symboli w polu Treść się nie zgadza.';

		if ($errors == false) {
			if(Repertoire::editRepertoire($id, $header, $text)){
				$_SESSION["msg"] = "Nowy repertuar został pomyślnie dodany do bazy danych!";
				$_SESSION["stat"] = "alert-success";
				header('Location: /repertoire/index/');
			}
			else{
				$_SESSION["msg"] = "Coś poszło nie tak..";
				$_SESSION["stat"] = "alert-danger";
			}
		}
	}

	require_once(ROOT . '/views/repertoire/repertoireForm.php');

	return true;

}

	public function actionDeleteRepertoire($id){

		User::checkRights("moder");

		if($id){
			if(Repertoire::deleteRepertoireById($id)){
				$_SESSION["msg"] = "Repertuar został pomyślnie usunięty.";
				$_SESSION["stat"] = "alert-success";
				header('Location: /repertoire/index/');
			}
			else{
				$_SESSION["msg"] = "Coś poszło nie tak..";
				$_SESSION["stat"] = "alert-danger";
			}
		}

		return true;
	}

}
