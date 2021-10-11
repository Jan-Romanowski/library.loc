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
