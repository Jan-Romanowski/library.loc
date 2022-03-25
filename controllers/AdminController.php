<?php

class AdminController
{


	/**
	 * @return bool
	 */
	public function actionIndex()
	{

		User::isAdmin();

		require_once ROOT . '/views/admin/index.php';

		return true;
	}
}

