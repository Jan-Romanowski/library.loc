<?php
    return array(

        'songs/([0-9]+)' => 'songs/index/$1',
        'songs/page-([0-9]+)' => 'songs/view/$1',
        'songs/newSong' => 'songs/NewSong',
        'songs' => 'songs/view',
        'folders' => 'folders/view',
        'user/register' => 'user/register',
        '' => 'site/index',
    );