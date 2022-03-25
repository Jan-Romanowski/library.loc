<?php

class Songs
{

	const SHOW_BY_DEFAULT = 50;

	/**
	 * @param $id
	 * @return mixed|void
	 */
	public static function getSongById($id)
	{
		$id = intval($id);

		if ($id) {

			$db = Db::getConnection();

			$result = $db->query('
            SELECT id_song, name_song, count_p, author, one_voice, song.id_folder, folder.name_folder, actual, song.note 
            FROM song 
              LEFT JOIN folder ON song.id_folder = folder.id_folder 
            WHERE id_song = ' . $id);
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
	public static function getSongsList($word, $parameter, $oneVoise, $multiVoise, $page = 1, $actual, $count = self::SHOW_BY_DEFAULT)
	{
		$db = Db::getConnection();

		$page = intval($page);
		$count = intval($count);
		$offset = ($page - 1) * $count;

		$songsList = array();

		if ($oneVoise == false && $multiVoise == true) {
			$voises = "AND (one_voice = 0)";
		} else if ($oneVoise == true && $multiVoise == false) {
			$voises = "AND (one_voice = 1)";
		} else if ($oneVoise == false && $multiVoise == false) {
			$voises = "AND (one_voice = 3)";
		} else {
			$voises = "";
		}

		if ($actual == 1) {
			$act = "AND actual = 1";
		} else
			$act = "";

		$result = $db->query("SELECT id_song, name_song, count_p, author, one_voice, actual, folder.name_folder
                                       FROM song 
                                       LEFT JOIN folder ON song.id_folder = folder.id_folder
                                       WHERE (name_song LIKE '%" . $word . "%' OR author LIKE '%" . $word . "%')"
			. $voises . "
                                       " . $act . "
                                       ORDER BY " . $parameter . " 
                                       LIMIT " . $count . " 
                                       OFFSET " . $offset . ";");


		$result->setFetchMode(PDO::FETCH_ASSOC);

		$i = 0;
		while ($row = $result->fetch()) {
			$songsList[$i]['id_song'] = $row['id_song'];
			$songsList[$i]['name_song'] = $row['name_song'];
			$songsList[$i]['count'] = $row['count_p'];
			$songsList[$i]['author'] = $row['author'];
			$songsList[$i]['one_voice'] = $row['one_voice'];
			$songsList[$i]['actual'] = $row['actual'];
			$songsList[$i]['name_folder'] = $row['name_folder'];

			$i++;
		}
		return $songsList;

	}

	/**
	 * @param $word
	 * @return mixed
	 */
	public static function getTotalSongs($word, $oneVoise, $multiVoise, $actual)
	{
		$db = Db::getConnection();

		if ($oneVoise == false && $multiVoise == true) {
			$voises = "AND (one_voice = 0)";
		} else if ($oneVoise == true && $multiVoise == false) {
			$voises = "AND (one_voice = 1)";
		} else if ($oneVoise == false && $multiVoise == false) {
			$voises = "AND (one_voice = 3)";
		} else {
			$voises = "";
		}

		if ($actual == 1) {
			$act = "AND actual = 1";
		} else
			$act = "";

		$result = $db->query("SELECT count(name_song) as kek
                                       FROM song
                                       WHERE (name_song LIKE '%" . $word . "%' OR author LIKE '%" . $word . "%')
                                       " . $act . "
                                       " . $voises . ";");

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$row = $result->fetch();

		return $row['kek'];
	}

	/**
	 * @param $count_p
	 * @return bool
	 */
	public static function checkCount($count_p)
	{
		if (($count_p) > 0) {
			return true;
		}
		return false;
	}

	/**
	 * @param $name
	 * @return bool
	 */
	public static function checkName($name)
	{
		if (strlen($name) > 5) {
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
	public static function addNewSong($name, $count_p, $author, $songType, $folder, $note)
	{

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

		if($result->execute()){
			$result = $result->insert_id;
		}
		else{
			$result = false;
		}
		return $result;

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
	public static function editSong($id, $name, $count_p, $author, $songType, $folder, $note)
	{

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
	public static function deleteSong($id)
	{
		$db = Db::getConnection();

		$sql = "DELETE FROM song
                WHERE id_song = '$id'";

		$result = $db->prepare($sql);

		return $result->execute();
	}


	/**
	 * @param $id
	 * @return mixed
	 */
	public static function getActualById($id)
	{
		$db = Db::getConnection();

		$result = $db->query("SELECT actual as act
                                       FROM song
                                       WHERE id_song = '$id';");

		$result->setFetchMode(PDO::FETCH_ASSOC);

		$row = $result->fetch();

		return $row['act'];
	}


	/**
	 * @param $id
	 * @param $status
	 * @return bool
	 */
	public static function changeActual($id, $status)
	{
		$db = Db::getConnection();

		$sql = "UPDATE song 
            SET 
                actual = '$status'
            WHERE id_song = '$id'";

		$result = $db->prepare($sql);

		return $result->execute();

	}

}
