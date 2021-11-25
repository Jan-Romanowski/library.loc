<?php


class Folders
{

    /**
     * @return array
     */
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

	/**
	 * @param $name_folder
	 * @param $note
	 * @return bool
	 */
	public static function newFolder($name_folder, $note){
		$db = Db::getConnection();

		$sql = 'INSERT INTO folder (name_folder, note)'
				.'VALUES (:name_folder, :note)';

		$result = $db->prepare($sql);
		$result->bindParam(':name_folder', $name_folder, PDO::PARAM_STR);
		$result->bindParam(':note', $note, PDO::PARAM_STR);

		try {
			return $result->execute();
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * @param $name_folder
	 * @return bool
	 */
	public static function checkNameFolder($name_folder){
		$db = Db::getConnection();

		$result = $db->prepare("SELECT COUNT(*) as cnt
										FROM folder
										WHERE name_folder = :name_folder");

		$result->bindParam(':name_folder', $name_folder, PDO::PARAM_STR);
		$row[] = $result->setFetchMode(PDO::FETCH_ASSOC);

		echo "<pre>";
		print_r($name_folder);
		print_r($row["cnt"]);
		echo "</pre>";


		if ($row > 0)
			return true;
		else
			return false;
	}

    /**
     * @param $id_folder
     * @return mixed
     */
    public static function countSongsInFolder($id_folder){
        $db = Db::getConnection();

        $result = $db->query("SELECT count(*) as kek
                                           FROM song where id_folder = '$id_folder'");
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['kek'];
    }

    /**
     * @param $id_folder
     * @return array
     */
    public static function getSongsFromFolder($id_folder){
        $db = Db::getConnection();

        $songsList = array();

        $result = $db->query("SELECT id_song, name_song, id_folder
                                       FROM song 
                                       WHERE id_folder = '$id_folder'");
        //$result -> setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while($row=$result->fetch()){
            $songsList[$i]['id_song'] = $row['id_song'];
            $songsList[$i]['name_song'] = $row['name_song'];

            $i++;
        }
        return $songsList;
    }

    /**
     * @return array
     */
    public static function getIdFolders(){
        $db = Db::getConnection();

        $songsList = array();

        $result = $db->query("SELECT id_folder, name_folder
                                       FROM folder");
        //$result -> setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while($row=$result->fetch()){
            $songsList[$i]['id_folder'] = $row['id_folder'];
            $songsList[$i]['name_folder'] = $row['name_folder'];
            $i++;
        }
        return $songsList;
    }

	public static function deleteFolderById($id){
		$db = Db::getConnection();

		$sql = "DELETE FROM folder
						WHERE id_folder = :id";

		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);

		return $result->execute();
	}

}
