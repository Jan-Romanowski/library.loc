<?php

class UserController{

    public function actionRegister(){

        $name = '';
        $surname = '';
        $email = '';
        $pass1 = '';
        $pass2 = '';

        if(isset($_POST['submit']) && !empty($_POST['submit'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];

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
                User::register($name, $surname, $email, $pass1, 1, 'admin');
            }

        }

        require_once(ROOT.'/views/user/register.php');

        return true;
    }


}
