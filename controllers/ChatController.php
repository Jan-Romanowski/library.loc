<?php

class ChatController{

	/**
	 * @return bool
	 */
	public function actionIndex(){

		User::checkRights("moder");

		if (isset($_POST['submit']) && !empty($_POST['submit'])) {

			$id_account = $_SESSION['user'];

			$mess = Get::post('message', '');

			$errors = false;

			if (!Chat::checkMessage($mess))
				$errors[] = 'Zakrótka wiadomość';

			if ($errors == false) {
				if(Chat::addMessage($id_account, $mess)){
					$mess = '';
				}
				else{
					$_SESSION["msg"] = "Coś poszło nie tak..";
					$_SESSION["stat"] = "alert-danger";
				}
			}

		}

		$messages = array();
		$messages = Chat::getMessages();

		require_once(ROOT . '/views/chat/index.php');

		return true;
	}


	public function actionNewMessage(){

		User::checkRights("moder");

		$id_account = $_SESSION['user'];

			$mess = Get::post('message', '');

			$errors = false;

			if (!Chat::checkMessage($mess))
				$errors[] = 'Zakrótka wiadomość';

			if ($errors == false) {
				if(Chat::addMessage($id_account, $mess)){
					$mess = '';
				}
				else{
					$_SESSION["msg"] = "Coś poszło nie tak..";
					$_SESSION["stat"] = "alert-danger";
				}
			}

	}


//	public function actionGetNewMessages(){
//
//		$lastId = Get::post('lastId', '');
//
//		$newMessages = array();
//
//		if(Chat::isNewMessagesExists($lastId) > 0){
//			$newMessages = Chat::getNewMessages($lastId);
//		}
//		else{
//			$newMessages = '';
//		}
//
//		die(json_encode($newMessages));
//
//	}

}
