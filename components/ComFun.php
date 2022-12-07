<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComFun
 *
 * @author vitalijs.romanovskis
 */
class ComFun
{

	static function translateRights($word)
	{
		switch ($word) {
			case 'user':
				return 'Użytkownik';
				break;
			case 'admin':
				return 'Administrator';
				break;
			case 'moder':
				return 'Moderator';
				break;
			case 'Użytkownik':
				return 'user';
				break;
			case 'Administrator':
				return 'admin';
				break;
			case 'Moderator':
				return 'moder';
				break;
			default:
				return false;
		}
	}

	static function rootColor($root)
	{
		switch ($root) {
			case 'user':
				return '#2548f7';
				break;
			case 'moder':
				return '#9900ff';
				break;
			case 'admin':
				return '#ff6f00';
				break;
			default:
				return '#5e5e5e';
				break;
		}
	}

	static function checked($checkbox)
	{
		if (isset($_SESSION[$checkbox]) && $_SESSION[$checkbox] == true)
			return true;
		else
			return false;
	}

	static function crutchForNews($link, $id, $filename, $path = '/news/deleteFileFromNews')
	{
		echo '<div class="container-fluid border">';

		$name = stristr($filename, '.', true);

		if(strcmp($name, 'top') == 0){
			echo '<button type="button" class="btn btn-outline-secondary disabled m-2 float-start"
							>Główne zdjęcie
						</button>';
		}else{
			echo '<button type="button" class="btn btn-outline-success m-2 float-start"
							onclick=document.location="/news/makePhotoAsMain/'. $id .'/'. $filename .'/">Zrobić jako główne
						</button>';
		}
		echo
			'	 
				   <button type="button" class="btn btn-outline-danger m-2 float-end" data-bs-toggle="modal" data-bs-target="#staticBackdropK' . $id . '">
						Usunąć
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill"
							 viewBox="0 0 16 16">
							<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
						</svg>
				   </button>
				   <div class="modal fade" id="staticBackdropK' . $id . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
						 aria-labelledby="staticBackdropLabel' . $id . '" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="staticBackdropLabel' . $id . '">Napewno chcesz usunąć to zdjęcie ?</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn btn-outline-danger w-25"
											onclick=document.location="' . $path . '/' .$id. '/'. $filename . '">Tak
									</button>
									<button type="button" class="btn btn-outline-success w-25" data-bs-dismiss="modal">Nie</button>
								</div>
							</div>
						</div>
					</div>
					
					<img src="' . $link . '" data-bs-toggle="modal" data-bs-target="#exampleModal' . $id . '" class="card-img-top p-2" alt="...">
					<!-- Modal -->
					<div class="modal fade" id="exampleModal' . $id . '" tabindex="-1" style="background-color: rgba(0,0,0, 0.6) !important;" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-xl p-0 bg-transparent">
							<div class="modal-content bg-transparent">
								<div class="modal-header">
									<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body p-0">
									<div class="container d-flex justify-content-center p-2 m-0">
										<img src="' . $link . '" class="container p-0 m-2" style="max-width: 80%;" alt="...">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		
			';
	}

	static function crutch_for_all($link, $id, $filename)
	{
		echo
			'
				<div class="container">
					
					<img src="' . $link . '" data-bs-toggle="modal" data-bs-target="#exampleModal' . $id . '" class="img custom_img card-img-top m-2" alt="...">
					<!-- Modal -->
					<div class="modal fade" id="exampleModal' . $id . '" tabindex="-1" style="background-color: rgba(0,0,0, 0.6) !important;" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-xl p-0 bg-transparent">
							<div class="modal-content bg-transparent">
								<div class="modal-header">
									<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body p-0">
									<div class="container d-flex justify-content-center p-2 m-0">
										<img src="' . $link . '" class="container p-0 m-2" style="max-width: 80%;" alt="...">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		
			';
	}

	static function countFilesInFolder($dir){

		$count = 0;

		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (false !== ($file = readdir($dh))) {
					if ($file != "." && $file != "..") {
						$count++;
					}
				}
			}
		}

		return $count;

	}

	static function sendMail($to, $message, $subject){

		$from = "system@chorkatedralnysiedlce.pl";

		$subject = "=?utf-8?B?".base64_encode($subject)."?=";

		$headers = "From: $from\r\nReply-to: $from\r\nContent-type:text/plain; charset=utf-8\r\n";

		if(mail($to, $subject, $message, $headers)){
			return true;
		}

		return false;

	}

	static function generateActualList(){

		$songList = array();
		$songList = Songs::getActualSongs();

		$text = "";

		foreach ($songList as $songListItem):
			$text = $text.$songListItem['name_song']." - ".$songListItem['author']."\n";
		endforeach;

		return $text;

	}

	static function generateActual(){

		$songList = array();
		$songList = Songs::getActualSongs();

		$text = "Cześć! Aktualne utwory w naszym repertuarze uległy zmianie. Proszę się nauczyć nowych utworów.\n\r";

		foreach ($songList as $songListItem):

			$text = $text.$songListItem['name_song']." - https://chorkatedralnysiedlce.pl/songs/".$songListItem['id_song']."\n";

		endforeach;

		$text = $text. "\n\nZdrówka\nAdministracja Systemu";

		return $text;

	}

	static function num_word($value, $words, $show = true)
	{
		$num = $value % 100;
		if ($num > 19) {
			$num = $num % 10;
		}

		$out = ($show) ?  $value . ' ' : '';
		switch ($num) {
			case 1:  $out .= $words[0]; break;
			case 2:
			case 3:
			case 4:  $out .= $words[1]; break;
			default: $out .= $words[2]; break;
		}

		return $out;
	}

	static function secToStr($secs)
	{
		$res = '';

		$days = floor($secs / 86400);
		$secs = $secs % 86400;

		if($days>365){
			$year = floor($days / 365);

			$res .= self::num_word($year, array('rok', 'lata', 'lat')) . ' ';
		}
		else{
			if($days>31){
				$month = floor($days / 30);
				$days = $days % 30;

				$res .= self::num_word($month, array('miesiąc', 'miesięcy', 'miesięcy')) . ' ';
			}
			else{

				if($days>7 && $days<30){

					$weeks = floor($days / 7);
					$days = $days % 7;

					$res .= self::num_word($weeks, array('tydzień', 'tygodni', 'tygodni')) . ' ';
				}
				else{
					if($days>0){
						$res .= self::num_word($days, array('dzień', 'dni', 'dni')) . ' ';
					}
					else if($days < 1){
						$hours = floor($secs / 3600);
						$secs = $secs % 3600;
						if($hours>0){
							$res .= self::num_word($hours, array('godzina', 'godziny', 'godzin')) . ' ';
						}
						elseif($hours < 5){
							$minutes = floor($secs / 60);
							$secs = $secs % 60;
							if($minutes>0){
								$res .= self::num_word($minutes, array('minuta', 'minuty', 'minut')) . ' ';
							}
							elseif ($minutes<30){
								$res .= self::num_word($secs, array('sekunda', 'sekundy', 'sekund'));
							}
						}
					}
				}
			}
		}
		return $res;
	}

	static function num_word_month($value, $words, $show = true)
	{
		$num = $value % 100;
		if ($num > 19) {
			$num = $num % 10;
		}

		$out = ($show) ?  $value . ' ' : '';
		switch ($num) {
			case 1:  $out .= $words[0]; break;
			case 2:
			case 3:
			case 4:  $out .= $words[1]; break;
			default: $out .= $words[2]; break;
		}

		return $out;
	}


	static function translateDate($date){

	$monthes = [1 => 'Stycznia', 2 => 'Lutego', 3 => 'Marca', 4 => 'Kwietnia', 5 => 'Maja', 6 => 'Czerwca',
		7 => 'Lipca', 8 => 'Sierpnia', 9 => 'Września', 10 => 'Października', 11 => 'Listopada', 12 => 'Grudnia'];

	$string = $date;
	$year = mb_strcut($string,0, 4);
	$monthId = (int) mb_strcut($string,5, 2);
	$day = (int) mb_strcut($string,8, 2);

	echo $day." ".$monthes[$monthId]." ".$year;

	}



}
