<?php

class UserController{

    /** Registration new User
     * @return bool
     */
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

            if(!User::chekPassword($pass1))
                $errors[] = 'Nieprawidłowe hasło';

            if(User::checkEmailExists($email))
                $errors[] = 'Taki email już jest zajęty.';

            if($errors==false){
                if(User::register($name, $surname, $email, $pass1)){
                    $message = 'Wniosek o rejestrację został złożony. Poczekaj na zaakceptowanie danych przez administratora.';
                }
            }

        }

        require_once(ROOT.'/views/user/register.php');

        return true;
    }


    /**
     * @return bool
     */
    public function actionLogin(){

        $email = '';
        $pass = '';

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            $errors = false;

            if(!User::chekEmail($email))
                $errors[] = 'Nieprawidłowy email';

            if(!User::chekPassword($pass))
                $errors[] = 'Hasło ma być nie któtrze niż 6 symboli';

            $userData = array();
            $userData = User::checkUserData($email, $pass);

            if($userData == false){
                $errors[] = 'Nieprawidłowe dane dla logowania';
            }
            else{
                User::auth($userData);
                header("Location: /songs");
            }

        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }

    /**
     * @return bool
     */
    public function actionView(){

        User::isModerator();

        $userList = array();
        $userList = User::getUsers();

        require_once(ROOT . '/views/user/userList.php');

        return true;

    }

    /**
     * @return bool
     */
    public function actionLogout(){
        session_unset();
        session_destroy();

        header("Location: /user/login");

        return true;
    }

    /**
     * @param $id
     * @param $rights
     * @return bool
     */
    public function actionChangeRights($id, $rights){

        User::isAdmin();

        if($id && $rights){
            if(User::changeRights($id, $rights)){
                $result = true;
            }
            else{
                $result = false;
            }
        }

        header("Location: /user/view/");

        return true;
    }

}
