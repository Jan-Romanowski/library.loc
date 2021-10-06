<?php

class SongsController{

    public function actionIndex($id){

            if($id){

            $songsItem = array();
            $songsItem = Songs::getSongById($id);

            require_once (ROOT . '\views\songs\songItem.php');

            return true;
        }
    }

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

    public function actionView($page = 1, $filter = ''){

        if(!isset($_SESSION['Sorting'])){
            $parameter = 'id_song';
        }
        else{
            $parameter = $_SESSION['Sorting'];
        }

        $songsList = array();
        $songsList = Songs::getSongsList($filter, $parameter, $page);

        $total = Songs::getTotalSongs();

        $pagination = new Pagination($total, $page, Songs::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '\views\songs\songList.php');

        return true;
    }

    public function actionNewSong(){

        $name = '';
        $count_p = '';
        $author = '';
        $folder = '';
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

        require_once(ROOT . '\views\songs\songNewItem.php');

        return true;
    }

}