<?php

function getNameFolder($id){
    $min = 0;
    $max = 100;
    while(true){
        if($min < $id && $id < $max){
            if($min==0)
                $result = "0".$min."00";
            else
                $result = "0" . $min;
            return $result;
        }
        else{
            $min+=100;
            $max+=100;
        }
    }
}

function translateRights($word){
    switch ($word){
        case 'user':
            return 'Użytkownik';
            break;
        case 'admin':
            return 'Administrator';
            break;
        case 'moder':
            return 'Moderator';
            break;
        case 'Użytkownik':
            return 'user';
            break;
        case 'Administrator':
            return 'admin';
            break;
        case 'Moderator':
            return 'moder';
            break;
        default:
            return false;
    }
}
