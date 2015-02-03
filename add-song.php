<?php 

require_once __DIR__ . '/GenreQuery.php';
require_once __DIR__ . '/ArtistQuery.php';
require_once __DIR__ . '/Song.php';

if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$artist = $_POST['artist'];
	$genre = $_POST['genre'];
	$price = $_POST['price'];
		
	$song = new Song();

	if($title !="" && $price!=""){
		$song->setTitle($title);
		$song->setArtistId($artist);
		$song->setGenreId($genre);
		$song->setPrice($price);

		$song->save();

		?><p>The song <?php echo $song->getTitle() ?>
   		with an ID of <?php echo $song->getId() ?>
 		was inserted successfully!</p>

 		<?php
	}

	session_destroy();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="post">
		Title: <input type="text" name="title">
		Artist:<select name="artist">
			<?php 
				$artistQuery = new ArtistQuery(); 
				$artists = $artistQuery->getAll();
			?>
			<?php foreach($artists as $artistObj) : ?>
				<option value="<?php echo $artistObj->id ?>"><?php echo $artistObj->artist_name ?></option>
			<?php endforeach; ?>
		</select>
		Genre:<select name="genre">
			<?php 
				$genreQuery = new GenreQuery(); 
				$genres = $genreQuery->getAll();


			?>
			<?php foreach($genres as $genreObj) : ?>
				<option value="<?php echo $genreObj->id ?>"><?php echo $genreObj->genre ?></option>
			<?php endforeach; ?>
		</select>
		Price: <input type="text" name="price">
		<input type="submit" name="submit" class="btn btn-default" value="Submit">
	</form>

</body>
</html>