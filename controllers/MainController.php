<?php

class MainController{

    /**
     * @return bool
     */
    public function actionIndex(){

        require_once ROOT.'/views/main/main.php';

        return true;
    }
}
