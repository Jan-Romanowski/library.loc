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
            $dir = ROOT.'/files/'.$folderName.'/'.$id;
            $dwnlpath = '/files/'.$folderName.'/'.$id;
            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    while (false !== ($file = readdir($dh))) {
                        if ($file != "." && $file != "..") {
                            $path = $dir . '/' . $file;
                            $files[$i]['filename'] = $file;
                            $files[$i]['dwnlpath'] = $dwnlpath.'/'.$file;
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

    /** Sorting songs
     * @param string $parameter
     * @return bool
     */
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
     * @param $parameter
     * @return bool
     */
    function actionSongsFilter($parameter){

        User::isLogin();

        if(0<$parameter && $parameter<5){
            switch ($parameter){
                case 1: // Wszystkie
                    $parameter = 2;
                    break;
                case 2: // Wielogłosowe
                    $parameter = 0;
                    break;
                case 3: // Jednogłosowe
                    $parameter = 1;
                    break;
				case 4: // Nijakie
					$parameter = 4;
					break;
            }
        }

        $_SESSION['Song_Filter'] = $parameter;

        header("Location: /songs");

        return true;
    }


    /** Get all songs
     * @param int $page
     * @return bool
     */
    public function actionView($page = 1){

        User::isLogin();

        if(!isset($_SESSION['Sorting'])){
            $parameter = 'id_song';
        }
        else{
            $parameter = $_SESSION['Sorting'];
        }

        if(!isset($_SESSION['word'])){
            $filter = ' ';
        }
        else{
            $filter = $_SESSION['word'];
        }

        if(!isset($_SESSION['Song_Filter'])){
            $songsFilter = '';
        }
        else{
            $songsFilter = $_SESSION['Song_Filter'];
        }

        $songsList = array();
        $songsList = Songs::getSongsList($filter, $parameter, $songsFilter, $page);

        $total = Songs::getTotalSongs($filter, $songsFilter);

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
                header("Location: /songs");
        }
        return true;
    }

	/**
	 * @param $id_folder
	 * @return bool
	 */
	public function actionUploadFile($id_folder){ // не работает mkdir !!!!!!!!!!!!!!!!!!!!!!!!!
		User::isModerator();
		
		if (!isset($_FILES["filename"]) || $_FILES["filename"]["error"] != 0) {
			$_SESSION["msg"] = 'No file!';
			header("Location: /songs/".$id_folder);
		}
		
		$folderName = self::getNameFolder($id_folder);
		if (!is_dir(ROOT_WEB.'/files/')) {
			mkdir(ROOT_WEB.'/files', 0700);
		}
		if (!is_dir(ROOT_WEB.'/files/'.$folderName)) {
			mkdir(ROOT_WEB.'/files/'.$folderName, 0700);
		}
		if (!is_dir(ROOT_WEB.'/files/'.$folderName.'/'.$id_folder)) {
			mkdir(ROOT_WEB.'/files/'.$folderName.'/'.$id_folder, 0700);
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
					$_SESSION["msg"] = 'File uploaded!';
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
        $dir = ROOT.'/files/'.$folderName.'/'.$id;
        $pathFile = $dir.'/'.$filename;
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (false !== ($file = readdir($dh))) {
                    if ($file != "." && $file != "..") {
                        if(strcmp($file, $filename) == 0){
                            unlink($pathFile);
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
}