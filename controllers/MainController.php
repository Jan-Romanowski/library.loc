<?php

class MainController{

    /**
     * @return bool
     */
    public function actionMainPage(){

        require_once ROOT.'/views/main/main.php';

        return true;
    }

    public function actionMembers(){

		require_once ROOT.'/views/main/members.php';

		return true;

    }

    public function actionHistory(){

        require_once ROOT.'/views/main/history.php';

        return true;
    }

    public function actionHoffman(){

        require_once ROOT.'/views/main/hoffman.php';

        return true;
    }

    public function actionContact(){

        require_once ROOT . '/views/main/contact.php';

        return true;
    }

    public function actionSzulik(){

        require_once ROOT.'/views/main/szulik.php';

        return true;
    }

	public function actionIza(){

		require_once ROOT.'/views/main/iza.php';

		return true;
	}

	public function actionNews(){

		require_once ROOT.'/views/main/news.php';

		return true;
	}
}
