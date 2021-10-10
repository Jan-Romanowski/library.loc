<?php
    return array(

        'songs/([0-9]+)' => 'songs/index/$1',
        'songs/page-([0-9]+)' => 'songs/view/$1',
        'songs/newSong' => 'songs/newSong',
        'songs/editSong/([0-9]+)' => 'songs/editSong/$1',
        'songs/filter-([0-9]+)' => 'songs/filter/$1',
        'songs/delete/([0-9]+)' => 'songs/delete/$1',
        'songs/search' => 'songs/search',
        'songs' => 'songs/view',
        'folders/newFolder' => 'folders/newFolder',
        'folders' => 'folders/view',
        'user/register' => 'user/register',
        'user/view' => 'user/view',
        '' => 'site/index',
    );