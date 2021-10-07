<?php

class SongsController{

    /** Get Song By Id
     * @param $id
     * @return bool|void
     */
    public function actionIndex($id){

        if($id){

            $songsItem = array();
            $songsItem = Songs::getSongById($id);

            require_once (ROOT . '\views\songs\songItem.php');

            return true;
        }
    }

    /** Search songs
     * @return bool
     */
    public function actionSearch(){

        $word = $_POST['word'];

        $_SESSION['word'] = $word;

        header("Location: /songs");

        return true;
    }


    /** Sorting songs
     * @param string $parameter
     * @return bool
     */
    public function actionFilter($parameter = 'id_song'){
        if(0<$parameter && $parameter<7){
            switch ($parameter){
                case 1:
                    $parameter = 'name_song';
                    break;
                case 2:
                    $parameter = 'name_song DESC';
                    break;
                case 3:
                    $parameter = 'author';
                    break;
                case 4:
                    $parameter = 'author DESC';
                    break;
                case 5:
                    $parameter = 'id_song';
                    break;
                case 6:
                    $parameter = 'id_song DESC';
                    break;
            }
        }

        $_SESSION['Sorting'] = $parameter;

        header("Location: /songs");

        return true;

    }

    /** Get all songs
     * @param int $page
     * @return bool
     */
    public function actionView($page = 1){

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

        $songsList = array();
        $songsList = Songs::getSongsList($filter, $parameter, $page);

        $total = Songs::getTotalSongs($filter);

        $pagination = new Pagination($total, $page, Songs::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '\views\songs\songList.php');

        return true;
    }


    /** Adding a new song
     * @return bool
     */
    public function actionNewSong(){

        $name = '';
        $count_p = '';
        $author = '';
        $folder_name = 'Wybierz teczkę';
        $folder_id = 8;
        $note = '';
        $result = false;

        if(isset($_POST['submit']) && !empty($_POST['submit'])) {

            $name = $_POST['song_name'];
            $count_p = $_POST['count_p'];
            $author = $_POST['autor'];
            $folder = $_POST['folders'];
            $note = $_POST['notatki'];

            $errors = false;

            if(!Songs::checkName($name))
                $errors[] = 'Zakrótka nazwa utwora';

            if(!Songs::checkCount($count_p))
                $errors[] = 'Ilość partytur nie może być ujemna';

            if($errors==false){
                $result = Songs::addNewSong($name, $count_p, $author, $folder, $note);
            }
        }

        $foldersList = array();
        $foldersList = Folders::getFolders();

        $message = 'Nowy utwór';

        require_once(ROOT . '\views\songs\songNewItem.php');

        return true;
    }

    public function actionEditSong($id){

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

                $name = $_POST['song_name'];
                $count_p = $_POST['count_p'];
                $author = $_POST['autor'];
                $folder_name = $_POST['folders'];
                //$folder_id = $_POST['id_folder'];
                $note = $_POST['notatki'];

                $errors = false;

                if (!Songs::checkName($name))
                    $errors[] = 'Zakrótka nazwa utwora';

                if (!Songs::checkCount($count_p))
                    $errors[] = 'Ilość partytur nie może być ujemna';

                if ($errors == false) {
                    $result = Songs::editSong($id, $name, $count_p, $author, $folder_name, $note);
                    if($result)
                        header("Location: /songs");
                }
            }

            $foldersList = array();
            $foldersList = Folders::getFolders();

            require_once(ROOT . '\views\songs\songNewItem.php');

            return true;
        }

    }

}