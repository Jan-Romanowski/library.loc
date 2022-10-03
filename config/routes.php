<?php
return array(

	'ajax/getSongs' => 'ajax/getSongs',

	'chat/index' => 'chat/index',
	'chat/refresh' => 'chat/refresh',
	'ajax/getNewMessages' => 'ajax/getNewMessages',

	'email/index' => 'email/index',
	'email/([0-9]+)/([0-9]+)' => 'email/editTemplate/$1/$2',
	'email/newTemplate/([0-9]+)' => 'email/newTemplate/$1',
	'email/deleteTemplate/([0-9]+)' => 'email/deleteTemplate/$1',

	'achievement/newAchievements' => 'achievement/newItem',
	'achievement/index' => 'achievement/index',
	'achievement/uploadPhoto/([0-9]+)' => 'achievement/uploadPhoto/$1',
	'achievement/deleteAchievement/([0-9]+)' => 'achievement/deleteAchievement/$1',

	'gallery/folder/([0-9]+)' => 'gallery/folder/$1',
	'gallery/tripsShow' => 'gallery/trips',
	'gallery/concertsShow' => 'gallery/concerts',
	'gallery/uploadPhoto' => 'gallery/uploadPhoto',
	'gallery/deleteFileFromGallery/([0-9]+)/([\w+.(jpeg|jpg|png)])' => 'gallery/deleteFileFromGallery/$1/$2',
	'gallery/index' => 'gallery/index',
	'gallery/createFolder' => 'gallery/createFolder',

	'admin' => 'admin/index',

	'songs/deleteFile/([0-9]+)/([\w+.(mp3|pdf|wave)])' => 'songs/deleteFile/$1/$2',
	'songs/([0-9]+)' => 'songs/index/$1',
	'songs/page-([0-9]+)' => 'songs/view/$1',
	'songs/newSong' => 'songs/newSong',
	'songs/editSong/([0-9]+)' => 'songs/editSong/$1',
	'songs/changeActual/([0-9]+)' => 'songs/changeActual/$1',
	'songs/uploadFile/([0-9]+)' => 'songs/uploadFile/$1',
	'songs/priorityFilter-([0-9]+)' => 'songs/priorityFilter/$1',
	'songs/applyFilters' => 'songs/applyFilters',
	'songs/delete/([0-9]+)' => 'songs/delete/$1',
	'songs/search' => 'songs/search',
	'songs' => 'songs/view',

	'folders/delete/([0-9]+)' => 'folders/delete/$1',
	'folders/newFolder' => 'folders/newFolder',
	'folders' => 'folders/view',

	'queries/deleteQuery/([0-9]+)' => 'queries/deleteQuery/$1',
	'queries/transferQuery/([0-9]+)' => 'queries/transferQuery/$1',
	'queries' => 'queries/queriesView',

	'users/register' => 'users/register',
	'users/login' => 'users/login',
	'users/view' => 'users/view',
	'users/deleteUser/([0-9]+)' => 'users/deleteUser/$1',
	'users/logout' => 'users/logout',
	'users/changeRights/([0-9]+)/([A-z]+)' => 'users/changeRights/$1/$2',

	'cabinet' => 'cabinet/index',

	'main/szulik' => 'main/szulik',
	'main/members' => 'main/members',
	'main/contact' => 'main/contact',
	'main/hoffman' => 'main/hoffman',
	'main/history' => 'main/history',
	'main/achivments' => 'main/achivments',
	'main/gallery' => 'main/gallery',
	'main/galleryFolder/([0-9]+)' => 'main/galleryFolder/$1',
	'main/iza' => 'main/iza',
	'main/news' => 'main/news',
	'main/newsItem/([0-9]+)' => 'main/newsItem/$1',
	'main' => 'main/mainPage',

	'news/makePhotoAsMain/([0-9]+)/([\w+.(jpeg|jpg|png)])' => 'news/makePhotoAsMain/$1/$2',
	'news/deleteFileFromNews/([0-9]+)/([\w+.(jpeg|jpg|png)])' => 'news/deleteFileFromNews/$1/$2',
	'news/uploadPhotoToNews/([0-9]+)' => 'news/uploadPhotoToNews/$1',
	'news/view/([0-9]+)' => 'news/view/$1',
	'news/editNews/([0-9]+)' => 'news/editNews/$1',
	'news/delete/([0-9]+)' => 'news/delete/$1',
	'news/newItem' => 'news/newItem',
	'news/index' => 'news/index',

	'repertoire/index' => 'repertoire/index',
	'repertoire/([0-9]+)/([0-9]+)' => 'repertoire/editRepertoire/$1/$2',
	'repertoire/newRepertoire/([0-9]+)' => 'repertoire/newRepertoire/$1',
	'repertoire/deleteRepertoire/([0-9]+)' => 'repertoire/deleteRepertoire/$1',


	'' => 'main/mainPage',
);