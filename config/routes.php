<?php
    return array(
        'songs/([0-9]+)' => 'songs/index/$1',
        'songs/page-([0-9]+)' => 'songs/view/$1',
        'songs/newSong' => 'songs/newSong',
        'songs/editSong/([0-9]+)' => 'songs/editSong/$1',
        'songs/uploadFile/([0-9]+)' => 'songs/uploadFile/$1',
        'songs/priorityFilter-([0-9]+)' => 'songs/priorityFilter/$1',
        'songs/songsFilter-([0-9]+)' => 'songs/songsFilter/$1',
        'songs/deleteFile/([0-9]+)/([.]+)' => 'songs/deleteFile/$1/$2',
        'songs/delete/([0-9]+)' => 'songs/delete/$1',
        'songs/search' => 'songs/search',
        'songs' => 'songs/view',
        'folders/delete/([0-9]+)' => 'folders/delete/$1',
        'folders/newFolder' => 'folders/newFolder',
        'folders' => 'folders/view',
        'queries/deleteQuery/([0-9]+)' => 'queries/deleteQuery/$1',
        'queries/transferQuery/([0-9]+)' => 'queries/transferQuery/$1',
        'queries' => 'queries/queriesView',
        'user/register' => 'user/register',
        'user/login' => 'user/login',
        'user/view' => 'user/view',
        'user/logout' => 'user/logout',
        'user/changeRights/([0-9]+)/([A-z]+)' => 'user/changeRights/$1/$2',
        'cabinet' => 'cabinet/index',
        'main' => 'main/index',
        '' => 'main/index',
    );