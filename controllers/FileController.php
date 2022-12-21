<?php

class FileController{

	public function actionDownload(){

		User::checkRights("user");

		$file = ROOT . $_POST['filePath'];
		$fileName = strrchr($file, '/');
	
		$file_extension = strtolower(substr(strrchr($file,"."),1));

		if(!file_exists($file)){
			die('file not found');
		} else {

			switch($file_extension)
			{
				case "pdf": $ctype="application/pdf"; break;
				case "mp3": $ctype="audio/mp3"; break;
				case "wav": $ctype="audio/wav"; break;
				
				default: $ctype="application/force-download";
	
			}

			header("Pragma: public");
			header("Content-Description: File Transfer");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-Type: $ctype");
			header("Content-Disposition: attachment; filename=$fileName");
			header("Content-Transfer-Encoding: binary");
			readfile($file);
			exit();
		}

		return true;

	}

	public function actionOpenFile(){

		User::checkRights("user");

		$filePath = ROOT . $_POST['filePath'];
		$fileName = strrchr($filePath, '/');
		

		$file_extension = strtolower(substr(strrchr($filePath,"."),1));

		if(!file_exists($filePath)){
			echo "Nie znaleziono pliku.";
			exit;
		}
		switch($file_extension)
		{
			case "pdf": $ctype="application/pdf"; break;
			// case "mp3": $ctype="audio/mp3"; break;
			// case "wav": $ctype="audio/wav"; break;
			
			default: $ctype="application/force-download";

		//	case "exe": $ctype="application/octet-stream"; break;
		//	case "zip": $ctype="application/zip"; break;
		//	case "doc": $ctype="application/msword"; break;
		//	case "xls": $ctype="application/vnd.ms-excel"; break;
		//	case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
		//	case "gif": $ctype="image/gif"; break;
		//	case "png": $ctype="image/png"; break;
		//	case "jpeg":
		//	case "jpg": $ctype="image/jpg"; break;

		}

		header("Pragma: public");
		header("Content-Description: File Transfer");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: $ctype");
		header("Content-Disposition: inline; filename=$fileName");
		header("Content-Transfer-Encoding: binary");
		


		readfile("$filePath");
		exit();

	}

	public function actionPlay(){

	}

}
