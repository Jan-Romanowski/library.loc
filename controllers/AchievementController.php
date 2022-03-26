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

	public function actionIndex(){

		User::isModerator();

		$achievementsList = array();
		$achievementsList = Achievements::getAchievements();

		require_once(ROOT . '/views/achievements/index.php');

		return true;
	}

}
