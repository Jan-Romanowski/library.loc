<?php

class NewsController
{

	/**
	 * @return bool
	 */
	public function actionIndex()
	{

		User::isModerator();

		$newsList = array();
		$newsList = News::getNewsList();

		require_once(ROOT . '/views/news/index.php');

		return true;
	}

	/**
	 * @return bool
	 */
	public function actionNewItem()
	{

		User::isModerator();

		$header = '';
		$text = '';
		$author = '';

		if (isset($_POST['submit']) && !empty($_POST['submit'])) {

			$header = GET::post('header', '');
			$text = GET::post('text', '');

			$search = ["\n"];
			$replace = ["<br>"];
			$text = str_replace($search, $replace, $text);

			$author = $_SESSION['name'] . " " . $_SESSION['surname'];

			$errors = false;

			if (News::checkHeader($header))
				$errors[] = 'Zadługi nagłówek (Ma byc do 100 symboli)';

			if (News::checkText($text))
				$errors[] = 'Zadługi tekst (Ma być do 3000 symboli)';

			if ($errors == false) {
				$result = News::setNewsItem($header, $text, $author);
				$_SESSION["msg"] = 'Post został pomyslnie obuplikowany';
				$_SESSION["stat"] = "alert-success";

			}
		}

		require_once(ROOT . '/views/news/newsForm.php');

		return true;

	}

	/**
	 * @param $id
	 * @return bool
	 */
	public function actionView($id)
	{

		User::isModerator();

		if ($id) {

			$newsItem = array();
			$newsItem = News::getNewsItemById($id);

			if (!is_dir(ROOT_WEB . '/news/')) {
				mkdir(ROOT_WEB . '/news', 0750, true);
			}

			if (!is_dir(ROOT_WEB . '/news/' . $id)) {
				mkdir(ROOT_WEB . '/news/' . $id, 0750, true);
			}

			$files = array();
			$i = 0;

			$dir = ROOT . '/public/news/' . $id;

			if (is_dir($dir)) {
				if ($dh = opendir($dir)) {
					while (false !== ($file = readdir($dh))) {
						if ($file != "." && $file != "..") {
							$path = $dir . '/' . $file;
							$files[$i]['file'] = '/news/' . $id . '/' . $file;
							$files[$i]['filename'] = $file;
							$i++;
						}
					}
				}
			}

			require_once(ROOT . '/views/news/newsItem.php');

		}

		return true;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	public function actionDelete($id)
	{ // Нужна проверка есть ли в папке файлы, и удаление папки

		User::isModerator();

		if ($id) {
			News::deleteNews($id);
			$_SESSION["msg"] = 'Post został pomyslnie usunięty';
			$_SESSION["stat"] = "alert-success";
		}

		header("Location: /news/index/");

		return true;

	}

	public function actionEditNews($id)
	{

		User::isModerator();

		if ($id) {

			$newsItem = array();
			$newsItem = News::getNewsItemById($id);

			$header = $newsItem['header'];
			$text = $newsItem['text'];
			$author = $newsItem['autor'];
			$resulf = false;

			if (isset($_POST['submit']) && !empty($_POST['submit'])) {

				$header = GET::post('header', '');
				$text = GET::post('text', '');
				$author = GET::post('autor', '');

				$errors = false;

				if (News::checkHeader($header))
					$errors[] = 'Zadługi nagłówek (Ma byc do 30 symboli)';

				if (News::checkText($text))
					$errors[] = 'Zadługi tekst (Ma być do 300 symboli)';

				if ($errors == false) {
					$result = News::updateNews($id, $header, $text);
				}

			}

		}

		return true;
	}

	public function actionUploadPhotoToNews($folder)
	{

		User::isModerator();

		//$folder = GET::post('folder', '');

		if (!isset($_FILES["filename"]) || $_FILES["filename"]["error"] != 0) {
			$_SESSION["msg"] = 'Nie znaleziono pliku!';
			$_SESSION["stat"] = "alert-danger";
			header("Location: /news/index");
		}

		if (!is_dir(ROOT_WEB . '/news/')) {
			mkdir(ROOT_WEB . '/news', 0750, true);
		}
		if (!is_dir(ROOT_WEB . '/news/' . $folder)) {
			mkdir(ROOT_WEB . '/news/' . $folder, 0750, true);
		}

		if (isset($_FILES['filename']['name']) && $_FILES['filename']['size']) {

			$original_filename = strval($_FILES['filename']['name']);

			$target = ROOT_WEB . '/news/' . $folder . '/' . basename($original_filename);
			$tmp = $_FILES['filename']['tmp_name'];

			move_uploaded_file($tmp, $target);
			$_SESSION["msg"] = 'Plik został pomyślnie wgrany!';
			$_SESSION["stat"] = "alert-success";
			header("Location: /news/view/" . $folder);

		}
		return true;

	}

}
