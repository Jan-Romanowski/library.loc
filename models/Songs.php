<?php

class Songs{

    const SHOW_BY_DEFAULT = 50;

    public static function getSongById($id){
        $id = intval($id);

        if($id){

            $db = Db::getConnection();

            $result = $db->query('
            SELECT id_song, name_song, count_p, author, song.id_folder, folder.name_folder, song.note 
            FROM song 
              LEFT JOIN folder ON song.id_folder = folder.id_folder 
            WHERE id_song = '.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $song = $result->fetch();

            return $song;
        }
    }

    public static function getSongsList($word, $parameter, $page = 1, $count = self::SHOW_BY_DEFAULT){
        $db = Db::getConnection();

        $page = intval($page);
        $count = intval($count);
        $offset = ( $page - 1 ) * $count;
        $songsList = array();

        $result = $db->query("SELECT id_song, name_song, count_p, author, folder.name_folder
                    FROM song 
                        LEFT JOIN folder ON song.id_folder = folder.id_folder
                            WHERE name_song LIKE '%".$word."%' OR author LIKE '%".$word."%'
                                ORDER BY ".$parameter." LIMIT ".$count." OFFSET ".$offset );

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while($row=$result->fetch()){
            $songsList[$i]['id_song'] = $row['id_song'];
            $songsList[$i]['name_song'] = $row['name_song'];
            $songsList[$i]['count'] = $row['count_p'];
            $songsList[$i]['author'] = $row['author'];
            $songsList[$i]['name_folder'] = $row['name_folder'];

            $i++;
        }
        return $songsList;

    }

    public static function getTotalSongs($word){
        $db = Db::getConnection();

        $result = $db->query("SELECT count(name_song) as kek
                                       FROM song
                                       WHERE name_song LIKE '%".$word."%' OR author LIKE '%".$word."%'");
        $result -> setFetchMode(PDO::FETCH_ASSOC);

        $row = $result->fetch();

        return $row['kek'];
    }

    public static function checkCount($count_p){
        if(($count_p)>0){
            return true;
        }
        return false;
    }

    public static function checkName($name){
        if(strlen($name)>5){
            return true;
        }
        return false;
    }

    public static function addNewSong($name, $count_p, $author, $folder, $note){

        $db = Db::getConnection();

        $sql = 'INSERT INTO song(name_song, count_p, author, id_folder, note)
            values (:name_song, :count_p, :author, :folder, :note)';

        $result = $db->prepare($sql);
        $result->bindParam(':name_song', $name, PDO::PARAM_STR);
        $result->bindParam(':count_p', $count_p, PDO::PARAM_INT);
        $result->bindParam(':author', $author, PDO::PARAM_STR);
        $result->bindParam(':folder', $folder, PDO::PARAM_INT);
        $result->bindParam(':note', $note, PDO::PARAM_STR);

        return $result->execute();

    }

    public static function editSong($id, $name, $count_p, $author, $folder, $note){

        $db = Db::getConnection();

        $sql = "UPDATE song 
            SET 
                name_song = '$name', 
                count_p = '$count_p', 
                author = '$author', 
                id_folder = '$folder', 
                note = '$note' 
            WHERE id_song = '$id'";

        $result = $db->prepare($sql);

        return $result->execute();

    }

    public static function deleteSong($id){
        $db = Db::getConnection();

        $sql = "DELETE FROM song
                WHERE id_song = '$id'";

        $result = $db->prepare($sql);

        return $result->execute();
    }

}
