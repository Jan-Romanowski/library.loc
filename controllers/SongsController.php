<?php

include_once ROOT.'/models/Songs.php';

class SongsController{

    public function actionIndex($id){
        $songsList = array();
        $songsList = Songs::getSongById($id);

        echo '<pre>';
        print_r($songsList);
        echo '</pre>';
    }

    public function actionView(){

    }

}