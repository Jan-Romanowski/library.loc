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

            if(User::checkName($name)){
            //    echo '<br>$name - ok';
            }
            else{
                $errors[] = 'Imię nie może być takie krótkie.';
            }

            if(User::chekSurname($surname)){
            //    echo '<br>$surname - ok';
            }
            else{
                $errors[] = 'Nazwisko nie może być takie krótkie.';
            }

            if(User::chekEmail($email)){
            //    echo '<br>$email - ok';
            }
            else{
                $errors[] = 'Nieprawidłowy Email';
            }

            if(User::chekEmail($email)){
            //    echo '<br>$email - ok';
            }
            else{
                $errors[] = 'Nieprawidłowy Email';
            }

            if(User::chekPasswords($pass1,$pass2)){
            //    echo '<br>Hasła są jednakowe';
            }
            else{
                $errors[] = 'Hasła nie są jednakowe';
            }

            if(User::chekPassword($pass1,$pass2)){
            //    echo '<br>Hasła są dobre';
            }
            else{
                $errors[] = 'Nieprawidłowe hasło';
            }

        }

        require_once(ROOT.'/views/user/register.php');

        return true;
    }


}
