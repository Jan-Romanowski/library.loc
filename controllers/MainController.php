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

	public function actionAchivments(){

		require_once ROOT.'/views/main/achivments.php';

		return true;

	}

	public function actionGallery(){

		require_once ROOT.'/views/main/gallery.php';

		return true;

	}

	public function actionWyjazdy(){

		require_once ROOT.'/views/main/wyjazdy.php';

		return true;

	}

	public function actionConcerts(){

		$files = array();
		$i = 0;

		$dir = ROOT.'/public/gallery/concerts';
		if (!is_dir(ROOT_WEB.'/gallery/concerts')) {
			mkdir(ROOT_WEB.'/gallery/concerts', 0750, true);
		}
		else if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (false !== ($file = readdir($dh))) {
					if ($file != "." && $file != "..") {
						$path = $dir . '/' . $file;
						$files[$i]['file'] = '/gallery/concerts/' . $file;
						$files[$i]['chapter'] = 'concerts';
						$files[$i]['filename'] = $file;
						$i++;
					}
				}
			}
		}

		require_once ROOT.'/views/main/concerts.php';

		return true;

	}

	public function actionTrips(){

		require_once ROOT.'/views/main/trips.php';

		return true;
	}

	public function actionGlosy(){

		require_once ROOT.'/views/main/glosy.php';

		return true;

	}
}
