<?php
session_start();

class CabinetController
{

    function actionIndex()
    {

        if (isset($_POST['submit_pass'])) {
            $old_pass = $_POST['old_pass'];
            $new_pass1 = $_POST['new_pass1'];
            $new_pass2 = $_POST['new_pass2'];

            $errors = false;

            if (!User::isGoodPassword($old_pass))
                $errors[] = "Nieprawidłowe stare hasło";

            if (!User::chekPassword($new_pass1))
                $errors[] = "Hasło ma być nie krótrze niż 6 symboli";

            if (!User::chekPasswords($new_pass1, $new_pass2))
                $errors[] = "Hasła nie są jednakowe";

            if ($errors == false) {
                if (User::changePassword($new_pass1)) ;
                $message = 'Hasło zostało pomyślnie zmienione';
            }
        }

        require_once ROOT . '/views/cabinet/cabinet.php';

        return true;
    }
}
