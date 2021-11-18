<?php

class QueriesController{

    /**
     * @return bool
     */
    function actionQueriesView(){

        User::isModerator();

        $queriesList = array();
        $queriesList = Queries::getQueries();

        require_once(ROOT . '/views/queries/queriesList.php');

        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    function actionDeleteQuery($id){

        User::isModerator();

        if($id)
        Queries::deleteQuery($id);

        header('Location: /queries/');

        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    function actionTransferQuery($id){

        User::isModerator();

		$ac_type = GET::post('ac_type', '');

        if(Queries::transferQuery($id, $ac_type))
            header('Location: /users/view');
        else
            header('Location: /queries');
        return true;
    }


}
