<?php

class FoldersController
{

	/** Get all folders
	 * @return bool
	 */
	public function actionView()
	{
		User::isLogin();

		$foldersList = array();
		$foldersList = Folders::getFolders();

		require_once(ROOT . '/views/folders/folderList.php');
		return true;
	}

	/**
	 * @return bool
	 */
	public function actionNewFolder()
	{
		User::isModerator();

		$result = '';
		$name_folder = '';
		$note = '';

		if (isset($_POST['submit']) && !empty($_POST['submit'])) {

			$name_folder = GET::post('name_folder', '');
			$note = GET::post('note', '');

			$errors = false;

			if (Folders::checkNameFolder($name_folder) == true) {
				$errors = true;
				$_SESSION["msg"] = 'Taka teczka już istnieje';
				$_SESSION["stat"] = "alert-danger";
			}

			if ($errors == false) {
				if (Folders::newFolder($name_folder, $note)) {
					$_SESSION["msg"] = "Nowa teczka została pomyślnie dodana do biblioteki !";
					$_SESSION["stat"] = "alert-success";

					$result = '';
					$name_folder = '';
					$note = '';

				} else {
					$_SESSION["msg"] = "Wystąpił błąd.";
					$_SESSION["stat"] = "alert-danger";
				}
			}
		}

		require_once(ROOT . '/views/folders/folderNewItem.php');
		return true;
	}

	public function actionEdit($id)
	{
		return true;
	}

	public function actionDelete($id)
	{
		User::isModerator();

		$result = Folders::countSongsInFolder($id);

		if ($result == 0 && Folders::deleteFolderById($id)) {
			$_SESSION["msg"] = "Teczka zostałą pomyślnie usunięta";
			$_SESSION["stat"] = "alert-success";
		} else {
			$_SESSION["msg"] = "Teczka zawiera utwory! Nie da się jej usunąć!";
			$_SESSION["stat"] = "alert-danger";
		}

		header('Location: /folders/');
		return true;
	}
}