<?php

class SongsController{

    /** Get Song By Id
     * @param $id
     * @return bool|void
     */
    public function actionIndex($id){

        User::isLogin();

        if($id){

            $songsItem = array();
            $songsItem = Songs::getSongById($id);

            if($songsItem['one_voice']==0)
                $typeSong = 'Wielogłosowy';
            else
                $typeSong = 'Jednogłosowy';

            $files = array();
            $i = 0;

            $folderName = SongsController::getNameFolder($id);
            $dir = ROOT.'/public/files/'.$folderName.'/'.$id;
            $dwnlpath = '/files/'.$folderName.'/'.$id;
            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    while (false !== ($file = readdir($dh))) {
                        if ($file != "." && $file != "..") {
                            $path = $dir . '/' . $file;
                            $files[$i]['filename'] = $file;
                            $files[$i]['dwnlpath'] = $dwnlpath.'/'.$file;
							$files[$i]['filetype'] = pathinfo($dwnlpath.'/'.$file)['extension'];
                            $i++;
                        }
                    }
                }
            }

            require_once (ROOT . '/views/songs/songItem.php');

            return true;
        }
    }

    /** Search songs
     * @return bool
     */
    public function actionSearch(){

        User::isLogin();

        $word = $_POST['word'];

        $_SESSION['word'] = $word;

        header("Location: /songs");

        return true;
    }

    public function actionPriorityFilter($parameter = 'id_song'){

        User::isLogin();

        if(0<$parameter && $parameter<7){
            switch ($parameter){
                case 1:
                    $parameter = 'name_song';
                    $_SESSION['Sorting_label'] = 'Nazwy utwora (A-z)';
                    break;
                case 2:
                    $parameter = 'name_song DESC';
                    $_SESSION['Sorting_label'] = 'Nazwy utwora (z-A)';
                    break;
                case 3:
                    $parameter = 'author';
                    $_SESSION['Sorting_label'] = 'Autora (A-z)';
                    break;
                case 4:
                    $parameter = 'author DESC';
                    $_SESSION['Sorting_label'] = 'Autora (z-A)';
                    break;
                case 5:
                    $parameter = 'id_song';
                    $_SESSION['Sorting_label'] = 'Numeru teczki (Rosnąco)';
                    break;
                case 6:
                    $parameter = 'id_song DESC';
                    $_SESSION['Sorting_label'] = 'Numeru teczki (Malejąco)';
                    break;
            }
        }

        $_SESSION['Sorting'] = $parameter;

        header("Location: /songs");

        return true;

    }


	/**
	 * @return bool
	 */
	public function actionApplyFilters(){

		User::isLogin();

		if(isset($_POST['checkBoxJ']) &&
			$_POST['checkBoxJ'] != '')
		{
			$_SESSION["oneVoise"] = true;
		}
		else
		{
			$_SESSION["oneVoise"] = false;
		}

		if(isset($_POST['checkBoxW']) &&
			$_POST['checkBoxW'] != '')
		{
			$_SESSION["multiVoise"] = true;
		}
		else
		{
			$_SESSION["multiVoise"] = false;
		}

		if(isset($_POST['actual']) &&
			$_POST['actual'] != '')
		{
			$_SESSION["actual"] = true;
		}
		else
		{
			$_SESSION["actual"] = false;
		}

		header("Location: /songs");

		return true;
	}


    /** Get all songs
     * @param int $page
     * @return bool
     */
    public function actionView($page = 1){

        User::isLogin();

        if(!isset($_SESSION['Sorting']))		// Сортировка
            $parameter = 'id_song';
        else
            $parameter = $_SESSION['Sorting'];

        if(!isset($_SESSION['word']))			// Поисковик
            $filter = ' ';
        else
            $filter = $_SESSION['word'];

        if(!isset($_SESSION['oneVoise']))		// Одноголосные
            $oneVoise = false;
        else
			$oneVoise = $_SESSION['oneVoise'];

		if(!isset($_SESSION['multiVoise'])) 	// Многоголосные
			$multiVoise = false;
		else
			$multiVoise = $_SESSION['multiVoise'];

		if(!isset($_SESSION['actual'])) 	// Многоголосные
			$actual = false;
		else
			$actual = $_SESSION['actual'];

		$songsList = array();
        $songsList = Songs::getSongsList($filter, $parameter, $oneVoise, $multiVoise, $page, $actual);

        $total = Songs::getTotalSongs($filter, $oneVoise, $multiVoise, $actual);

        $pagination = new Pagination($total, $page, Songs::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/songs/songList.php');

        return true;
    }


    /** Adding a new song
     * @return bool
     */
    public function actionNewSong(){

        User::isModerator();

        $name = '';
        $count_p = '';
        $author = '';
        $folder_name = 'Wybierz teczkę';
        $folder_id = 8;
        $note = '';
        $result = false;

        if(isset($_POST['submit']) && !empty($_POST['submit'])) {

			$name = GET::post('song_name', '');
			$count_p = GET::post('count_p', 0);
			$author = GET::post('autor', '');
			$folder = GET::post('folders', '');
			$note = GET::post('notatki', '');

            if(isset($_POST['typeSong']) && $_POST['typeSong']=='one')
                $songType = 1;
            else if(isset($_POST['typeSong']) && $_POST['typeSong']=='two')
                $songType = 0;
            else
                $songType = 0;

            $errors = false;

            if(!Songs::checkName($name))
                $errors[] = 'Zakrótka nazwa utwora';

            if(!Songs::checkCount($count_p))
                $errors[] = 'Ilość partytur nie może być ujemna';

            if($errors==false){
                Songs::addNewSong($name, $count_p, $author, $songType, $folder, $note);
				$_SESSION["msg"] = "Nowy utwór został pomyślnie dodany do biblioteki.";
				$_SESSION["stat"] = "alert-success";
            }
        }

        $foldersList = array();
        $foldersList = Folders::getFolders();

        $message = 'Nowy utwór';

        require_once(ROOT . '/views/songs/songNewItem.php');

        return true;
    }


    /** Edit song
     * @param $id
     * @return bool|void
     */
    public function actionEditSong($id){

        User::isModerator();

        if($id) {

            $songsItem = array();
            $songsItem = Songs::getSongById($id);

            $message = 'Edycja utworu - ' . $songsItem['name_song'];

            $name = $songsItem['name_song'];
            $count_p = $songsItem['count_p'];
            $author = $songsItem['author'];
            $folder_name = $songsItem['name_folder'];
            $folder_id = $songsItem['id_folder'];
            $note = $songsItem['note'];
            $result = false;

            if (isset($_POST['submit']) && !empty($_POST['submit'])) {

				$name = GET::post('song_name', '');
				$count_p = GET::post('count_p', '');
				$author = GET::post('autor', '');
				$folder_name = GET::post('folders', '');

                if(isset($_POST['typeSong']) && $_POST['typeSong']=='one')
                    $songType = 1;
                else if(isset($_POST['typeSong']) && $_POST['typeSong']=='two')
                    $songType = 0;
                else
                    $songType = 0;
                $note = $_POST['notatki'];

                $errors = false;

                if (!Songs::checkName($name))
                    $errors[] = 'Zakrótka nazwa utwora';

                if (!Songs::checkCount($count_p))
                    $errors[] = 'Ilość partytur nie może być ujemna';

                if ($errors == false) {
					Songs::editSong($id, $name, $count_p, $author, $songType, $folder_name, $note);
					$_SESSION["msg"] = "Dane zostały zaktualizowane.";
					$_SESSION["stat"] = "alert-success";
                }
            }

            $foldersList = array();
            $foldersList = Folders::getFolders();

            require_once(ROOT . '/views/songs/songNewItem.php');

            return true;
        }
    }

    /**
     * @param $id
     * @return bool
    */
    public function actionDelete($id){

        User::isModerator();

        if($id){

            $result = Songs::deleteSong($id);
            if($result)
				$_SESSION["msg"] = "Utwór został pomyślnie usunięty.";
				$_SESSION["stat"] = "alert-success";
                header("Location: /songs");
        }
        return true;
    }

	/**
	 * @param $id_folder
	 * @return bool
	 */
	public function actionUploadFile($id_folder){
		User::isModerator();
		
		if (!isset($_FILES["filename"]) || $_FILES["filename"]["error"] != 0) {
			$_SESSION["msg"] = 'Nie znaleziono pliku!';
			$_SESSION["stat"] = "alert-danger";
			header("Location: /songs/".$id_folder);
		}
		
		$folderName = self::getNameFolder($id_folder);
		if (!is_dir(ROOT_WEB.'/files/')) {
			mkdir(ROOT_WEB.'/files', 0750, true);
		}
		if (!is_dir(ROOT_WEB.'/files/'.$folderName)) {
			mkdir(ROOT_WEB.'/files/'.$folderName, 0750, true);
		}
		if (!is_dir(ROOT_WEB.'/files/'.$folderName.'/'.$id_folder)) {
			mkdir(ROOT_WEB.'/files/'.$folderName.'/'.$id_folder, 0750, true);
		}

		if (isset($_FILES['filename']['name']) && $_FILES['filename']['size']) {
//			$total_files = count($_FILES['filename']['name']);

//			for ($key = 0; $key < $total_files; $key++) {

//				if (isset($_FILES['filename']['name'][$key])
//					&& $_FILES['filename']['size'][$key] > 0) {

					$original_filename = strval($_FILES['filename']['name']);

					$target = ROOT_WEB.'/files/'.$folderName.'/'.$id_folder.'/'.basename($original_filename);
					$tmp  = $_FILES['filename']['tmp_name'];

					move_uploaded_file($tmp, $target);
					$_SESSION["msg"] = 'Plik został pomyślnie wgrany!';
					header("Location: /songs/".$id_folder);
//				}
//			}
		}
		return true;
	}

    /**
     * @param $id
     * @param $filename
     * @return bool
     */
    public function actionDeleteFile($id, $filename){

        User::isModerator();

        $folderName = self::getNameFolder($id);

        $dir = ROOT.'/public/files/'.$folderName.'/'.$id;
        $pathFile = $dir.'/'.$filename;

        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (false !== ($file = readdir($dh))) {
                    if ($file != "." && $file != "..") {
                        if(strcmp($file, $filename) == 0){
                            unlink($pathFile);
							$_SESSION["msg"] = "Plik został pomyślnie usunięty";
							$_SESSION["stat"] = "alert-success";
                            header('Location: /songs/'.$id);
                        }
                    }
                }
            }
        }
        return true;
    }

    /**
     * @param $id
     * @return string
     */
    function getNameFolder($id) {
		$min = 0;
		$max = 100;
		while (true) {
			if ($min < $id && $id < $max) {
				return "0".$min.($min==0 ? "00" : "");

			} else {
				$min += 100;
				$max += 100;
			}
		}
	}


	/**
	 * @param $id
	 * @return bool
	 */
	public function actionChangeActual($id){
		User::isModerator();

		if(Songs::getActualById($id) == 0){
			if(Songs::changeActual($id, 1)){
				$_SESSION["msg"] = "Utwór został pomyślnie dodany do aktualnych";
				$_SESSION["stat"] = "alert-success";
			}
		}
		else{
			if(Songs::changeActual($id, 0)){
				$_SESSION["msg"] = "Utwór został usunięty z aktualnych";
				$_SESSION["stat"] = "alert-success";
			}
		}

		header("Location: /songs");

		return true;
	}
}