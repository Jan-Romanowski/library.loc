<?php

class FileController{

	public function actionDownload(){

		User::checkRights("user");

		$file = ROOT . $_POST['filePath'];

		if(!file_exists($file)){
			die('file not found');
		} else {
			header("Cache-Control: public");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$file");
			header("Content-Type: application/wav");
			header("Content-Transfer-Encoding: binary");

			readfile($file);
		}

		return true;

	}

	public function actionOpenFile(){

		User::checkRights("user");

		$file = ROOT . $_POST['filePath'];

		if(!file_exists($file)){
			die('file not found');
		} else {
			header("Cache-Control: public");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$file");
			header("Content-Type: application/pdf");
			header("Content-Transfer-Encoding: binary");

			fopen($file, 'r');
		}

		return true;

	}

}
