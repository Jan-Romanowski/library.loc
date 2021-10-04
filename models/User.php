<?php

class User{

    public static function register(){

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

}