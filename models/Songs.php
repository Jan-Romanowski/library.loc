<?php

class Songs{
    public static function getSongById($id){
        $id = intval($id);

        if($id){

            $db = Db::getConnection();

            $result = $db->query('
            SELECT id_song, name_song, count, author, song.id_folder, folder.name_folder, song.note 
            FROM song 
              LEFT JOIN folder ON song.id_folder = folder.id_folder 
            WHERE id_song = '.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $song = $result->fetch();

            return $song;
        }
    }

    public static function getNewsList(){

    }
}
