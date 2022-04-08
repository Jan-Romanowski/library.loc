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

	static function crutch($link, $id, $filename, $path = '/gallery/deleteFileFromGallery')
	{
		echo
			'
				<div class="container-fluid border">
				
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
											onclick=document.location="' . $path . '/' .$id. '/'. $filename . '/">Tak
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

}
