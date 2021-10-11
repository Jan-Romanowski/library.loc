<?php
    return array(

        'songs/([0-9]+)' => 'songs/index/$1',
        'songs/page-([0-9]+)' => 'songs/view/$1',
        'songs/newSong' => 'songs/newSong',
        'songs/editSong/([0-9]+)' => 'songs/editSong/$1',
        'songs/uploadFile/([0-9]+)' => 'songs/uploadFile/$1',
        'songs/filter-([0-9]+)' => 'songs/filter/$1',
        'songs/delete/([0-9]+)' => 'songs/delete/$1',
        'songs/search' => 'songs/search',
        'songs' => 'songs/view',
        'folders/delete/([0-9]+)' => 'folders/delete/$1',
        'folders/newFolder' => 'folders/newFolder',
        'folders' => 'folders/view',
        'files/([0-9]+)/([0-9]+)/([A-z]+)([0-9]+)' => 'songs/downloadFile/$1/$2/$3',
        'user/register' => 'user/register',
        'user/login' => 'user/login',
        'user/view' => 'user/view',
        'cabinet' => 'cabinet/index',
        '' => 'site/index',
    );