<?php

class User{

    public static function register($name, $surname, $email, $pass1, $activated, $ac_type){
        $db = Db::getConnection();

        $sql = 'INSERT INTO accounts (email, ac_password, name, surname, activated, ac_type)'
                .'VALUES (:email, :ac_password, :name, :surname, :activated, :ac_type)';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':ac_password', $pass1, PDO::PARAM_STR);
        $result->bindParam(':activated', $activated, PDO::PARAM_INT);
        $result->bindParam(':ac_type', $ac_type, PDO::PARAM_STR);

        return $result->execute();

    }

    public static function checkName($name){
        if(strlen($name) >= 3){
            return true;
        }
        return false;
    }

    public static function chekSurname($surname){
        if(strlen($surname) >= 3){
            return true;
        }
        return false;
    }

    public static function chekEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public static function chekPasswords($pass1, $pass2){
        if(strcasecmp($pass1, $pass2)==0){
            return true;
        }
        return false;
    }

    public static function chekPassword($pass1, $pass2){
        if(strlen($pass1)>=6 && strlen($pass2)>=6){
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email){
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM accounts WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email,PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;

        return false;

    }

    public static function getUsers(){
        $db = Db::getConnection();

        $userList = array();

        $result = $db->query("SELECT email, name, surname, ac_type, regist_date
                                       FROM accounts 
                             ");

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while($row=$result->fetch()){
            $userList[$i]['email'] = $row['email'];
            $userList[$i]['name'] = $row['name'];
            $userList[$i]['surname'] = $row['surname'];
            $userList[$i]['ac_type'] = $row['ac_type'];
            $userList[$i]['regist_date'] = $row['regist_date'];

            $i++;
        }

        return $userList;
    }

}