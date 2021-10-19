<?php

class Songs{

    const SHOW_BY_DEFAULT = 50;

    /**
     * @param $id
     * @return mixed|void
     */
    public static function getSongById($id){
        $id = intval($id);

        if($id){

            $db = Db::getConnection();

            $result = $db->query('
            SELECT id_song, name_song, count_p, author, one_voice, song.id_folder, folder.name_folder, song.note 
            FROM song 
              LEFT JOIN folder ON song.id_folder = folder.id_folder 
            WHERE id_song = '.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $song = $result->fetch();

            return $song;
        }
    }

    /**
     * @param $word
     * @param $parameter
     * @param int $page
     * @param int $count
     * @return array
     */
    public static function getSongsList($word, $parameter, $songsFilter, $page = 1, $count = self::SHOW_BY_DEFAULT){
        $db = Db::getConnection();

        $page = intval($page);
        $count = intval($count);
        $offset = ( $page - 1 ) * $count;
        $songsList = array();

        if($songsFilter == 2){
            $result = $db->query("SELECT id_song, name_song, count_p, author, one_voice, folder.name_folder
                                       FROM song 
                                       LEFT JOIN folder ON song.id_folder = folder.id_folder
                                       WHERE (name_song LIKE '%".$word."%' OR author LIKE '%".$word."%')
                                       ORDER BY ".$parameter." 
                                       LIMIT ".$count." 
                                       OFFSET ".$offset.";");
        }
        else{
            $result = $db->query("SELECT id_song, name_song, count_p, author, one_voice, folder.name_folder
                                       FROM song 
                                       LEFT JOIN folder ON song.id_folder = folder.id_folder
                                       WHERE (name_song LIKE '%".$word."%' OR author LIKE '%".$word."%')
                                       AND (one_voice = '$songsFilter') 
                                       ORDER BY ".$parameter." 
                                       LIMIT ".$count." 
                                       OFFSET ".$offset.";");
        }


        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while($row=$result->fetch()){
            $songsList[$i]['id_song'] = $row['id_song'];
            $songsList[$i]['name_song'] = $row['name_song'];
            $songsList[$i]['count'] = $row['count_p'];
            $songsList[$i]['author'] = $row['author'];
            $songsList[$i]['one_voice'] = $row['one_voice'];
            $songsList[$i]['name_folder'] = $row['name_folder'];

            $i++;
        }
        return $songsList;

    }

    /**
     * @param $word
     * @return mixed
     */
    public static function getTotalSongs($word, $songsFilter){
        $db = Db::getConnection();

        if($songsFilter == 2) {
            $result = $db->query("SELECT count(name_song) as kek
                                       FROM song
                                       WHERE name_song LIKE '%" . $word . "%' OR author LIKE '%" . $word . "%'");
        }
        else{
            $result = $db->query("SELECT count(name_song) as kek
                                       FROM song
                                       WHERE (name_song LIKE '%" . $word . "%' OR author LIKE '%" . $word . "%')
                                       AND (one_voice = '$songsFilter')");
        }
        $result -> setFetchMode(PDO::FETCH_ASSOC);

        $row = $result->fetch();

        return $row['kek'];
    }

    /**
     * @param $count_p
     * @return bool
     */
    public static function checkCount($count_p){
        if(($count_p)>0){
            return true;
        }
        return false;
    }

    /**
     * @param $name
     * @return bool
     */
    public static function checkName($name){
        if(strlen($name)>5){
            return true;
        }
        return false;
    }

    /**
     * @param $name
     * @param $count_p
     * @param $author
     * @param $folder
     * @param $note
     * @return bool
     */
    public static function addNewSong($name, $count_p, $author,$songType, $folder, $note){

        $db = Db::getConnection();

        $sql = 'INSERT INTO song(name_song, count_p, author, one_voice, id_folder, note)
            values (:name_song, :count_p, :author, :voice, :folder, :note)';

        $result = $db->prepare($sql);
        $result->bindParam(':name_song', $name, PDO::PARAM_STR);
        $result->bindParam(':count_p', $count_p, PDO::PARAM_INT);
        $result->bindParam(':author', $author, PDO::PARAM_STR);
        $result->bindParam(':voice', $songType, PDO::PARAM_INT);
        $result->bindParam(':folder', $folder, PDO::PARAM_INT);
        $result->bindParam(':note', $note, PDO::PARAM_STR);

        return $result->execute();

    }

    /**
     * @param $id
     * @param $name
     * @param $count_p
     * @param $author
     * @param $folder
     * @param $note
     * @return bool
     */
    public static function editSong($id, $name, $count_p, $author, $songType, $folder, $note){

        $db = Db::getConnection();

        $sql = "UPDATE song 
            SET 
                name_song = '$name', 
                count_p = '$count_p', 
                author = '$author', 
                one_voice = '$songType',
                id_folder = '$folder', 
                note = '$note' 
            WHERE id_song = '$id'";

        $result = $db->prepare($sql);

        return $result->execute();

    }

    /**
     * @param $id
     * @return bool
     */
    public static function deleteSong($id){
        $db = Db::getConnection();

        $sql = "DELETE FROM song
                WHERE id_song = '$id'";

        $result = $db->prepare($sql);

        return $result->execute();
    }

}
