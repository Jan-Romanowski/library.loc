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

    public function actionView($page = 1, $word = '', $parameter = 'id_song'){

        $songsList = array();
        $songsList = Songs::getSongsList($word, $parameter, $page);

        $total = Songs::getTotalSongs();

        $pagination = new Pagination($total, $page, Songs::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '\views\songs\songList.php');

        /*
        echo '<pre>';
        print_r($songsList);
        echo '</pre>';
        */

        return true;
    }

    public function actionNewSong(){

        $foldersList = array();
        $foldersList = Folders::getFolders();

        require_once(ROOT . '\views\songs\songNewItem.php');

        return true;
    }

    public function actionAddSong(){

    }

}