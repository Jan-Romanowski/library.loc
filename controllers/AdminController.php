<?php

class AdminController
{


	/**
	 * @return bool
	 */
	public function actionIndex()
	{

		User::isAdmin();

		require_once ROOT . '/views/admin/index.php';

		return true;
	}


	/**
	 * @return bool
	 */
	public function actionGallery()
	{

		$files = array();
		$i = 0;

		$dir = ROOT . '/public/gallery/trips';

		if (!is_dir(ROOT_WEB . '/gallery/trips')) {
			mkdir(ROOT_WEB . '/gallery/trips', 0750, true);
		} else if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (false !== ($file = readdir($dh))) {
					if ($file != "." && $file != "..") {
						$path = $dir . '/' . $file;
						$files[$i]['file'] = '/gallery/trips/' . $file;
						$files[$i]['chapter'] = 'trips';
						$files[$i]['filename'] = $file;
						$i++;
					}
				}
			}
		}

		$dir = ROOT . '/public/gallery/concerts';
		if (!is_dir(ROOT_WEB . '/gallery/concerts')) {
			mkdir(ROOT_WEB . '/gallery/concerts', 0750, true);
		} else if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (false !== ($file = readdir($dh))) {
					if ($file != "." && $file != "..") {
						$path = $dir . '/' . $file;
						$files[$i]['file'] = '/gallery/concerts/' . $file;
						$files[$i]['chapter'] = 'concerts';
						$files[$i]['filename'] = $file;
						$i++;
					}
				}
			}
		}

		require_once ROOT . '/views/admin/gallery.php';

		return true;
	}

	public function actionDeleteFileFromGallery($chapter, $filename)
	{

		User::isModerator();

		$dir = ROOT . '/public/gallery/' . $chapter;
		$pathFile = $dir . '/' . $filename;

		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (false !== ($file = readdir($dh))) {
					if ($file != "." && $file != "..") {
						if (strcmp($file, $filename) == 0) {
							unlink($pathFile);
							$_SESSION["msg"] = "Zdjęcie zostało pomyślnie usunięte";
							$_SESSION["stat"] = "alert-success";
							header('Location: /admin/gallery');
						}
					}
				}
			}
		}
		return true;
	}

	public function actionUploadPhoto()
	{
		User::isModerator();

		$chapter = GET::post('chapter', '');

		if (!isset($_FILES["filename"]) || $_FILES["filename"]["error"] != 0) {
			$_SESSION["msg"] = 'Nie znaleziono pliku!';
			$_SESSION["stat"] = "alert-danger";
			header("Location: /admin/gallery");
		}

		if (!is_dir(ROOT_WEB . '/gallery/')) {
			mkdir(ROOT_WEB . '/gallery', 0750, true);
		}
		if (!is_dir(ROOT_WEB . '/gallery/' . $chapter)) {
			mkdir(ROOT_WEB . '/gallery/' . $chapter, 0750, true);
		}

		if (isset($_FILES['filename']['name']) && $_FILES['filename']['size']) {

			$original_filename = strval($_FILES['filename']['name']);

			$target = ROOT_WEB . '/gallery/' . $chapter . '/' . basename($original_filename);
			$tmp = $_FILES['filename']['tmp_name'];

			move_uploaded_file($tmp, $target);
			$_SESSION["msg"] = 'Plik został pomyślnie wgrany!';
			$_SESSION["stat"] = "alert-success";
			header("Location: /admin/gallery");

		}
		return true;
	}


}

