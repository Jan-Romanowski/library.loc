<?php

class CabinetController
{

    /**
     * @return bool
     */
    function actionIndex()
    {
        User::isLogin();

        if (isset($_POST['submit_pass'])) {

			$old_pass = GET::post('old_pass', '');
			$new_pass1 = GET::post('new_pass1', '');
			$new_pass2 = GET::post('new_pass2', '');

            $errors_pass = false;

            if (!User::isGoodPassword($old_pass))
                $errors_pass[] = "Nieprawidłowe stare hasło";

            if (!User::chekPassword($new_pass1))
                $errors_pass[] = "Hasło ma być nie krótrze niż 6 symboli";

            if (!User::chekPasswords($new_pass1, $new_pass2))
                $errors_pass[] = "Hasła nie są jednakowe";

            if ($errors_pass == false) {
                if(User::changePassword($new_pass1)) ;
                    $message_pass = 'Hasło zostało pomyślnie zmienione';
                }
            }

            else if (isset($_POST['submit_data'])) {
                $email = $_POST['mail'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];

                $errors_data = false;

                if (User::checkEmailExists($email))
                    $errors_data[] = "Taki email już jest zajęty";

                if (!User::checkName($name))
                    $errors_data[] = "Nieprawidłowe imię";

                if (!User::chekSurname($surname))
                    $errors_data[] = "Nieprawidłowe nazwisko";

                if ($errors_data == false) {
                    if (User::changeData($name,$surname,$email)) ;
                    $message_data = 'Dane zostały pomyślnie zmienione<br>Zaloguj się ponownie, aby zmiany zaczęły obowiązywać';
                }

            }

        require_once ROOT . '/views/cabinet/cabinet.php';

        return true;
    }
}
