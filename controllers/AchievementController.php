<?php

class AchievementController{

	/**
	 * @return bool
	 */
	public function actionNewItem()
	{

		User::isModerator();

		$text = '';

		if (isset($_POST['submit']) && !empty($_POST['submit'])) {

			$text = GET::post('text', '');

			$search = ["\n"];
			$replace = ["<br>"];
			$text = str_replace($search, $replace, $text);

			$errors = false;

			if (News::checkText($text))
				$errors[] = 'Zadługi tekst (Ma być do 3000 symboli)';

			if ($errors == false) {
				$result = Achievements::setNewItem($text);
				$_SESSION["msg"] = 'Post został pomyslnie obuplikowany';
				$_SESSION["stat"] = "alert-success";

			}
		}

		require_once(ROOT . '/views/achievements/achievementsForm.php');

		return true;

	}


	/**
	 * @return bool
	 */
	public function actionIndex(){

		User::isModerator();

		$achievementsList = array();
		$achievementsList = Achievements::getAchievements();

		if (!is_dir(ROOT_WEB . '/achievements/')) {
			mkdir(ROOT_WEB . '/achievements', 0750, true);
		}

		foreach ($achievementsList as $achievementsListItem):

			$id = $achievementsListItem['id'];

			if (!is_dir(ROOT_WEB . '/achievements/' . $id)) {
				mkdir(ROOT_WEB . '/achievements/' . $id, 0750, true);
			}

			endforeach;

		require_once(ROOT . '/views/achievements/index.php');

		return true;
	}


	/**
	 * @param $id
	 * @return bool
	 */
	public function actionUploadPhoto($id){

		User::isModerator();

		if (!isset($_FILES["filename"]) || $_FILES["filename"]["error"] != 0) {
			$_SESSION["msg"] = 'Nie znaleziono pliku!';
			$_SESSION["stat"] = "alert-danger";
			header("Location: /news/index");
		}

		if (!is_dir(ROOT_WEB . '/achievements/')) {
			mkdir(ROOT_WEB . '/achievements', 0750, true);
		}
		if (!is_dir(ROOT_WEB . '/achievements/' . $id)) {
			mkdir(ROOT_WEB . '/achievements/' . $id, 0750, true);
		}

		$dir = ROOT . '/public_html/achievements/' . $id;

		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (false !== ($file = readdir($dh))) {
					if ($file != "." && $file != "..") {
						$path = $dir . '/' . $file;
						unlink($path);
					}
				}
			}
		}

		if (isset($_FILES['filename']['name']) && $_FILES['filename']['size']) {

			$original_filename = strval($_FILES['filename']['name']);

			$target = ROOT_WEB . '/achievements/' . $id . '/' . basename($original_filename);
			$tmp = $_FILES['filename']['tmp_name'];

			move_uploaded_file($tmp, $target);
			$_SESSION["msg"] = 'Plik został pomyślnie wgrany!';
			$_SESSION["stat"] = "alert-success";
			header("Location: /achievement/index/");

		}
		return true;
	}


	/**
	 * @param $id
	 * @return bool
	 */
	public function actionDeleteAchievement($id){

		User::isModerator();

		$dir = ROOT . '/public_html/achievements/' . $id;

		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (false !== ($file = readdir($dh))) {
					if ($file != "." && $file != "..") {
						$path = $dir . '/' . $file;
						unlink($path);
					}
				}
			}
		}

		rmdir($dir);

		if ($id) {
			Achievements::deleteAchievement($id);
			$_SESSION["msg"] = 'Post został pomyslnie usunięty';
			$_SESSION["stat"] = "alert-success";
		}

		header("Location: /achievement/index/");

		return true;
	}

}
