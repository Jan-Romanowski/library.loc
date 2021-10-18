<?php
session_start();

class QueriesController{

    function actionQueriesView(){

        $queriesList = array();
        $queriesList = Queries::getQueries();

        require_once(ROOT . '\views\queries\queriesList.php');

        return true;
    }

    function actionDeleteQuery($id){

        if($id)
        Queries::deleteQuery($id);

        header('Location: /queries/');

        return true;
    }

    function actionTransferQuery($id){

        $ac_type = $_POST['ac_type'];

        if(Queries::transferQuery($id, $ac_type))
            header('Location: /users/view');
        else
            header('Location: /queries');
        return true;
    }


}
