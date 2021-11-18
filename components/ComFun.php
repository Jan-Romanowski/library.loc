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

}
