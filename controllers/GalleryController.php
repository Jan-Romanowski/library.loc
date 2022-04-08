<?php

class GalleryController{


	/**
	 * @return bool
	 */
	public function actionIndex()
	{

		User::checkRights("moder");

		$galleryList = array();
		$galleryList = Gallery::getFolders();

		if (!is_dir(ROOT_WEB . '/gallery'))
			mkdir(ROOT_WEB . '/gallery', 0777, true);

		foreach ($galleryList as $galleryItem) {
			if (!is_dir(ROOT_WEB . '/gallery/' . $galleryItem['id'])) {
				mkdir(ROOT_WEB . '/gallery/' . $galleryItem['id'], 0777, true);
			}
		}

		require_once ROOT . '/views/gallery/index.php';

		return true;
	}



	/**
	 * @return bool
	 */
	public function actionTrips(){

		User::checkRights("moder");

		$files = array();
		$i = 0;

		$dir = ROOT . '/public_html/gallery/trips';

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

		$name = 'Wyjazdy';

		require_once ROOT . '/views/gallery/photos.php';

		return true;

	}


	/**
	 * @param $chapter
	 * @param $filename
	 * @return bool
	 */
	public function actionDeleteFileFromGallery($id, $filename)
	{

		User::checkRights("moder");

		$dir = ROOT . '/public_html/gallery/' . $id;
		$pathFile = $dir . '/' . $filename;

		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (false !== ($file = readdir($dh))) {
					if ($file != "." && $file != "..") {
						if (strcmp($file, $filename) == 0) {
							unlink($pathFile);
							$_SESSION["msg"] = "Zdjęcie zostało pomyślnie usunięte";
							$_SESSION["stat"] = "alert-success";
							header('Location: /gallery/folder/' . $id .'/');
						}
					}
				}
			}
		}
		return true;
	}


	/**
	 * @return bool
	 */
	public function actionUploadPhoto()
	{
		User::checkRights("moder");

		$id = Get::post('id', 0);

		if (!isset($_FILES["filename"]) || $_FILES["filename"]["error"] != 0) {
			$_SESSION["msg"] = 'Nie znaleziono pliku!';
			$_SESSION["stat"] = "alert-danger";
			header("Location: /gallery/index");
		}

		if (!is_dir(ROOT_WEB . '/gallery/')) {
			mkdir(ROOT_WEB . '/gallery', 0777, true);
		}
		if (!is_dir(ROOT_WEB . '/gallery/' . $id)) {
			mkdir(ROOT_WEB . '/gallery/' . $id, 0777, true);
		}

		if (isset($_FILES['filename']['name']) && $_FILES['filename']['size']) {

			$original_filename = strval($_FILES['filename']['name']);

			$target = ROOT_WEB . '/gallery/' . $id . '/' . basename($original_filename);
			$tmp = $_FILES['filename']['tmp_name'];

			move_uploaded_file($tmp, $target);

			$_SESSION["msg"] = 'Plik został pomyślnie wgrany!';
			$_SESSION["stat"] = "alert-success";
			header("Location: /gallery/index");

		}
		return true;
	}

	public function actionCreateFolder(){

		User::checkRights("moder");

		$name = '';

		$result = false;

		if (isset($_POST['submit']) && !empty($_POST['submit'])) {

			$name = Get::post('name', '');

			$errors = false;

			if (!Gallery::checkName($name))
				$errors[] = 'Zakrótka nazwa foldera';

			if ($errors == false) {
				if(Gallery::addFolder($name)){
					$_SESSION["msg"] = "Nowy folder został pomyślnie dodany do biblioteki.";
					$_SESSION["stat"] = "alert-success";
					header('Location: /gallery/index/');
				}
				else{
					$_SESSION["msg"] = "Coś poszło nie tak..";
					$_SESSION["stat"] = "alert-danger";
				}
			}
		}

		require_once(ROOT . '/views/gallery/galleryForm.php');

		return true;
	}


	public function actionFolder($id){

		$galleryItem = array();
		$galleryItem = Gallery::getFolderById($id);

		if(User::isLogin()){

		}
			$files = array();
			$i = 0;

			$dir = ROOT . '/public_html/gallery/' . $id;
			$dwnlpath = '/gallery/' . $id;

			if (is_dir($dir)) {
				if ($dh = opendir($dir)) {
					while (false !== ($file = readdir($dh))) {
						if ($file != "." && $file != "..") {
							$path = $dir . '/' . $file;
							$files[$i]['file'] = '/gallery/'.$id. '/' . $file;
							$files[$i]['filename'] = $file;
							$i++;

						}
					}
				}
			}

		require_once(ROOT . '/views/gallery/photos.php');

		return true;

	}


}