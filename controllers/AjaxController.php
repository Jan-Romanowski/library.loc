<?php

class AjaxController{

	public function actionGetSongs($page = 1){

		if (!isset($_SESSION['multiVoise']))
			$_SESSION['multiVoise'] = true;

		if (!isset($_SESSION['Sorting']))    // Сортировка
			$parameter = 'id_song';
		else
			$parameter = $_SESSION['Sorting'];

		$filter = Get::post('val', '');

		if (!isset($_SESSION['oneVoise']))    // Одноголосные
			$oneVoise = false;
		else
			$oneVoise = $_SESSION['oneVoise'];

		if (!isset($_SESSION['multiVoise']))  // Многоголосные
			$multiVoise = false;
		else
			$multiVoise = $_SESSION['multiVoise'];

		if (!isset($_SESSION['actual']))  // Многоголосные
			$actual = false;
		else
			$actual = $_SESSION['actual'];

		$songsList = array();
		$songsList = Songs::getSongsList($filter, $parameter, $oneVoise, $multiVoise, $page, $actual);

		$result = array();
		$i=0;

		foreach ($songsList as $songItem):
			$result[$i] = $songItem['name_song'];
			$i++;
			endforeach;

		die(json_encode($result));

	}

}
