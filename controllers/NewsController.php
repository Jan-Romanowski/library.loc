<?php

class NewsController
{

	/**
	 * @return bool
	 */
	public function actionIndex()
	{

		User::checkRights("moder");

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

		User::checkRights("moder");

		$header = '';
		$text = '';
		$author = '';

		if (isset($_POST['submit']) && !empty($_POST['submit'])) {

			$header = Get::post('header', '');
			$text = Get::post('text', '');

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

		User::checkRights("moder");

		if ($id) {

			$newsItem = array();
			$newsItem = News::getNewsItemById($id);

			if (!is_dir(ROOT_WEB . '/news/')) {
				mkdir(ROOT_WEB . '/news', 0777, true);
			}

			if (!is_dir(ROOT_WEB . '/news/' . $id)) {
				mkdir(ROOT_WEB . '/news/' . $id, 0777, true);
			}

			$files = array();
			$i = 0;

			$dir = ROOT . '/public_html/news/' . $id;

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
	{

		User::checkRights("moder");

		$dir = ROOT . '/public_html/news/' . $id;

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
			News::deleteNews($id);
			$_SESSION["msg"] = 'Post został pomyslnie usunięty';
			$_SESSION["stat"] = "alert-success";
		}


		header("Location: /news/index/");

		return true;

	}

	public function actionEditNews($id)
	{

		User::checkRights("moder");

		if ($id) {

			$newsItem = array();
			$newsItem = News::getNewsItemById($id);

			$header = $newsItem['header'];
			$text = $newsItem['text'];
			$author = $newsItem['autor'];
			$resulf = false;

			if (isset($_POST['submit']) && !empty($_POST['submit'])) {

				$header = Get::post('header', '');
				$text = Get::post('text', '');
				$author = Get::post('autor', '');

				$errors = false;

				if (News::checkHeader($header))
					$errors[] = 'Zadługi nagłówek (Ma byc do 30 symboli)';

				if (News::checkText($text))
					$errors[] = 'Zadługi tekst (Ma być do 300 symboli)';

				if ($errors == false) {
					$result = News::updateNews($id, $header, $text);

					$_SESSION["msg"] = 'Dane zostały pomyślnie zmienionę.';
					$_SESSION["stat"] = "alert-success";
				}

			}

		}

		require_once(ROOT . '/views/news/newsForm.php');

		return true;
	}

	public function actionUploadPhotoToNews($folder)
	{

		User::checkRights("moder");

		//$folder = Get::post('folder', '');

		if (!isset($_FILES["filename"]) || $_FILES["filename"]["error"] != 0) {
			$_SESSION["msg"] = 'Nie znaleziono pliku!';
			$_SESSION["stat"] = "alert-danger";
			header("Location: /news/index");
		}

		if (!is_dir(ROOT_WEB . '/news/')) {
			mkdir(ROOT_WEB . '/news', 0777, true);
		}
		if (!is_dir(ROOT_WEB . '/news/' . $folder)) {
			mkdir(ROOT_WEB . '/news/' . $folder, 0777, true);
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


	public function actionDeleteFileFromNews($id, $filename)
	{

		User::checkRights("moder");

		$dir = ROOT . '/public_html/news/' . $id;

		//echo 'Files: '.ComFun::countFilesInFolder($dir).' ////';

		$pathFile = $dir . '/' . $filename;

		unlink($pathFile);

		$_SESSION["msg"] = "Zdjęcie zostało pomyślnie usunięte";
		$_SESSION["stat"] = "alert-success";

		header("Location: /news/view/" . $id);


		return true;
	}

}
