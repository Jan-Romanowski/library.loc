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

    public static function getSongsList($word, $parameter){
        $db = Db::getConnection();


        $result = $db->query("SELECT id_song, name_song, count, author, folder.name_folder
                    FROM song 
                        LEFT JOIN folder ON song.id_folder = folder.id_folder
                            WHERE name_song LIKE '%".$word."%' OR author LIKE '%".$word."%'
                                ORDER BY ".$parameter);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while($row=$result->fetch()){
            $songList[$i]['id_song'] = $row['id_song'];
            $songList[$i]['name_song'] = $row['name_song'];
            $songList[$i]['count'] = $row['count'];
            $songList[$i]['author'] = $row['author'];
            $songList[$i]['name_folder'] = $row['name_folder'];

            $i++;
        }
        return $songList;



    }
}
