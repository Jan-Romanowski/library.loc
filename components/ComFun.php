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
class ComFun {

	static function translateRights($word){
    switch ($word){
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

	static function rootColor($root){
		switch ($root){
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

	static function checked($checkbox){
		if(isset($_SESSION[$checkbox]) && $_SESSION[$checkbox] == true)
			return true;
		else
			return false;
	}

	static function crutch($link, $id){
		echo
			'
				
					<img src="'.$link.'" data-bs-toggle="modal" data-bs-target="#exampleModal'.$id.'" class="custom_img card-img-top m-2" alt="...">
				
				<!-- Modal -->
				<div class="modal fade" id="exampleModal'.$id.'" tabindex="-1" style="background-color: rgba(0,0,0, 0.6) !important;" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl p-0 bg-transparent">
						<div class="modal-content bg-transparent">
							<div class="modal-header">
								<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body p-0">
								<div class="container d-flex justify-content-center p-2 m-0">
									<img src="'.$link.'" class="container p-0 m-2" style="max-width: 80%;" alt="...">
								</div>
							</div>
						</div>
					</div>
				</div>
			';
	}
}
