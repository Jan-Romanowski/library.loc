<?php

class MainController
{

	/**
	 * @return bool
	 */
	public function actionMainPage()
	{

		$newsList = array();
		$newsList = News::getNewsList();

		require_once ROOT . '/views/main/main/main.php';

		return true;
	}

	public function actionMembers()
	{

		require_once ROOT . '/views/main/members/members.php';

		return true;

	}

	public function actionHistory()
	{

		require_once ROOT . '/views/main/about/history/history.php';

		return true;
	}

	public function actionHoffman()
	{

		require_once ROOT . '/views/main/about/hoffmann/hoffman.php';

		return true;
	}

	public function actionContact()
	{

		require_once ROOT . '/views/main/contact/contact.php';

		return true;
	}

	public function actionSzulik()
	{

		require_once ROOT . '/views/main/about/szulik/szulik.php';

		return true;
	}

	public function actionIza()
	{

		require_once ROOT . '/views/main/about/kiryluk/iza.php';

		return true;
	}

	public function actionNewsItem($id)
	{

		if ($id) {

			$newsItem = array();
			$newsItem = News::getNewsItemById($id);

			if (!is_dir(ROOT_WEB . '/news/')) {
				mkdir(ROOT_WEB . '/news', 0750, true);
			}

			if (!is_dir(ROOT_WEB . '/news/' . $id)) {
				mkdir(ROOT_WEB . '/news/' . $id, 0750, true);
			}

			$files = array();
			$i = 0;

			$dir = ROOT . '/public_html/news/' . $id;

			if (is_dir($dir)) {
				if ($dh = opendir($dir)) {
					while (false !== ($file = readdir($dh))) {
						if ($file != "." && $file != "..") {
							$path = $dir . '/' . $file;
							$files[$i]['file'] = '/news/' . $id . '/' . $file;
							$files[$i]['filename'] = $file;
							$i++;
						}
					}
				}
			}

			require_once(ROOT . '/views/main/news/newsItem.php');

		}

		return true;
	}

	public function actionNews()
	{

		$newsList = array();
		$newsList = News::getNewsList();

		require_once(ROOT . '/views/main/news/news.php');

		return true;
	}

	public function actionAchivments()
	{

		$achievementsList = array();
		$achievementsList = Achievements::getAchievements();

		if (!is_dir(ROOT_WEB . '/achievements/')) {
			mkdir(ROOT_WEB . '/achievements', 0750, true);
		}

		foreach ($achievementsList as $achievementsListItem):

			$id = $achievementsListItem['id'];

			if (!is_dir(ROOT_WEB . '/achievements/' . $id)) {
				mkdir(ROOT_WEB . '/achievements/' . $id, 0750, true);
			}

		endforeach;

		require_once ROOT . '/views/main/about/achievements/achievements.php';

		return true;

	}

	public function actionGallery()
	{

		$galleryList = array();
		$galleryList = Gallery::getFolders();

		require_once ROOT . '/views/main/about/gallery/gallery.php';

		return true;

	}

	public function actionGalleryFolder($id){

		$galleryItem = array();
		$galleryItem = Gallery::getFolderById($id);

		if(User::isLogin()){

		}
		$files = array();
		$i = 0;

		$dir = ROOT . '/public_html/gallery/' . $id;
		$dwnlpath = '/gallery/' . $id;

		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (false !== ($file = readdir($dh))) {
					if ($file != "." && $file != "..") {
						$path = $dir . '/' . $file;
						$files[$i]['file'] = '/gallery/'.$id. '/' . $file;
						$files[$i]['filename'] = $file;
						$i++;

					}
				}
			}
		}

		require_once(ROOT . '/views/main/about/gallery/folder.php');

		return true;

	}


}
