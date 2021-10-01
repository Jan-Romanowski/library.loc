<?php

include_once ROOT.'/models/Songs.php';

class SongsController{

    public function actionIndex($id){

        if($id){
            $songsItem = array();
            $songsItem = Songs::getSongById($id);

            echo '<pre>';
            print_r($songsItem);
            echo '</pre>';

            return true;
        }
    }

    public function actionView(){

        $word = '';
        $parameter = 'id_song';

        $songsList = array();
        $songsList = Songs::getSongsList($word, $parameter);



        require_once ROOT.'/views/songs/index.php';

        echo '<pre>';
        print_r($songsList);
        echo '</pre>';

        return true;
    }

}