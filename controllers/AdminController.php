<?php

class AdminController
{


	/**
	 * @return bool
	 */
	public function actionIndex()
	{

		User::checkRights("admin");

		require_once ROOT . '/views/admin/index.php';

		return true;
	}
}

