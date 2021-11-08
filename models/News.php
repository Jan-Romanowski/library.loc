<?php

class News{
    /**
     * @param $id
     * @return mixed|void
     */
    public static function getNewsItemById($id){
        $id = intval($id);

        if($id){

            $db = Db::getConnection();

            $result = $db->query('
            SELECT id_news, header, text, date_news, autor 
            FROM news 
            WHERE id_news = '.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $news = $result->fetch();

            return $news;
        }
    }

    /**
     * @param $header
     * @return bool
     */
    public static function checkHeader($header){
        if(strlen($header)>29){
            return true;
        }
        return false;
    }

    /**
     * @param $text
     * @return bool
     */
    public static function checkTexT($text){
        if(strlen($text)>299){
            return true;
        }
        return false;
    }


    /**
     * @param $header
     * @param $text
     * @param $autor
     * @return bool
     */
    public static function setNewsItem($header, $text, $autor){
        $db = Db::getConnection();

        $sql = 'INSERT INTO news(header, text, autor)
            values (:header, :text, :author)';

        $result = $db->prepare($sql);
        $result->bindParam(':header', $header, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':author', $autor, PDO::PARAM_STR);

        return $result->execute();

    }

    public static function getNewsList(){
        $db = Db::getConnection();

        $result = $db->query("SELECT id_song, name_song, count_p, author, one_voice, folder.name_folder
                                       FROM news");
    }
}