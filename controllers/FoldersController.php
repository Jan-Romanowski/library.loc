<?php


class FoldersController{


    /** Get all folders
     * @return bool
     */
    public function actionView(){

        $foldersList = array();
        $foldersList = Folders::getFolders();

        require_once(ROOT . '\views\folders\folderList.php');

        /*
        $foldersList = array();
        $foldersList = Folders::countSongsInFolder();

        $result = array();
        $i = 0;
        foreach ($foldersList as $kek):
        $songsList = array();
        $result[$i]['Folder'] = $kek;
        $songsList = Folders::getSongsFromFolder($kek);
        $result[$i]['id_song'] = $songsList['id_song'];
        $result[$i]['name_song'] = $songsList['name_song'];
        endforeach;
        */

        return true;

    }

    /**
     * @return bool
     */
    public function actionNewFolder(){

        $result = '';
        $name_folder = '';
        $note = '';

        if(isset($_POST['submit']) && !empty($_POST['submit'])) {

            $name_folder = $_POST['name_folder'];
            $note = $_POST['note'];

            $errors = false;

            if(!Folders::checkNameFolder($name_folder))
                $errors[] = 'Taka teczka już istnieje';

            if($errors==false){
                $result = Folders::newFolder($name_folder, $note);
            }
        }

        require_once(ROOT . '\views\folders\folderNewItem.php');

        return true;
    }

    public function actionEdit($id){

        return true;
    }

    public function actionDelete($id){

        $result = Folders::countSongsInFolder($id);

        echo '<pre>';
        print_r($result);
        echo '</pre>';

        return true;
    }
}