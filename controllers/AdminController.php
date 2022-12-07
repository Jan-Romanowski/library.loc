<?php

class AdminController
{


	/**
	 * @return bool
	 */
	public function actionIndex()
	{

		User::checkRights("moder");

		require_once ROOT . '/views/admin/index.php';

		return true;
	}
}

