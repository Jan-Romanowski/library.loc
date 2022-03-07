<?php

class AdminController{


	/**
	 * @return bool
	 */
	public function actionIndex(){

		User::isAdmin();

		require_once ROOT . '/views/admin/index.php';

		return true;
	}


	/**
	 * @return bool
	 */
	public function actionGallery(){

		$files = array();
		$i = 0;

		$dir = ROOT.'/public/gallery/trips';

		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (false !== ($file = readdir($dh))) {
					if ($file != "." && $file != "..") {
						$path = $dir . '/' . $file;
						$files[$i]['file'] = '/gallery/trips/'.$file;
						$i++;
					}
				}
				$dir = ROOT.'/public/gallery/concerts';
				while (false !== ($file = readdir($dh))) {
					if ($file != "." && $file != "..") {
						$path = $dir . '/' . $file;
						$files[$i]['file'] = '/gallery/concerts/'.$file;
						$i++;
					}
				}
			}
		}

		require_once ROOT . '/views/admin/gallery.php';

		return true;
	}




}

