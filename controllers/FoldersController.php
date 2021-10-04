<?php


class FoldersController{

    public function actionView(){

        $foldersList = array();
        $foldersList = Folders::getFolders();

        require_once(ROOT . '\views\folders\folderList.php');

        return true;

    }
}