<?php


class Folders
{
    public static function getFolders(){

        $db = Db::getConnection();

        $foldersList = array();

        $result = $db->query("SELECT id_folder, name_folder, note 
                        FROM folder 
                        ORDER BY name_folder");


        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while($row=$result->fetch()){
            $foldersList[$i]['id_folder'] = $row['id_folder'];
            $foldersList[$i]['name_folder'] = $row['name_folder'];

            $i++;
        }
        return $foldersList;

    }

}
