<?php 

require_once __DIR__ . '/Database.php';

class GenreQuery extends Database{

	public function __construct(){
		parent::__construct();
		session_start();
	}
	
	public function getAll(){

		$sql = "
		  SELECT *
		  FROM genres
		  ORDER BY genre ASC
		";

		$statement = static::$pdo->prepare($sql);
		$statement->execute();
		$genres = $statement->fetchAll(PDO::FETCH_OBJ);

		return $genres;
	}
}

 ?>