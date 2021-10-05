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

    public function actionView($page = 1, $word = '', $parameter = 'name_song'){

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

        $name = '';
        $count_p = '';
        $author = '';
        $folder = '';
        $note = '';

        if(isset($_POST['submit']) && !empty($_POST['submit'])) {

            $name = '';
            $count_p = '';
            $author = '';
            $folder = '';
            $note = '';

            $errors = false;

            if(!User::checkName($name))
                $errors[] = 'Imię nie może być takie krótkie.';

            if(!User::chekSurname($surname))
                $errors[] = 'Nazwisko nie może być takie krótkie.';

            if(!User::chekEmail($email))
                $errors[] = 'Nieprawidłowy Email';

            if(!User::chekPasswords($pass1,$pass2))
                $errors[] = 'Hasła nie są jednakowe';

            if(!User::chekPassword($pass1,$pass2))
                $errors[] = 'Nieprawidłowe hasło';

            if(User::checkEmailExists($email))
                $errors[] = 'Taki email już jest zajęty.';

            if($errors==false){
                Songs::addNewSong($name, $count_p,$author,$folder, $note);
            }

        }

        $foldersList = array();
        $foldersList = Folders::getFolders();

        require_once(ROOT . '\views\songs\songNewItem.php');

        return true;
    }

    public function actionAddSong(){

    }

}