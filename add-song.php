<?php 

require_once __DIR__ . '/GenreQuery.php';
require_once __DIR__ . '/ArtistQuery.php';
require_once __DIR__ . '/Song.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert Song</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	<div class="jumbotron">
		<div class="container"><h2>Insert A Song</h2></div>
		
	</div>
	<div class-"container">
	<div class="panel panel-default">
		<div class="panel-body">
		<form method="post">
			<div class="form-group">
				<label>Title: </label>
				<input type="text" name="title">
			</div>
			<div class="form-group">
				<label>Artist: </label>
				<select name="artist">
				<?php 
					$artistQuery = new ArtistQuery(); 
					$artists = $artistQuery->getAll();
				?>
				<?php foreach($artists as $artistObj) : ?>
					<option value="<?php echo $artistObj->id ?>"><?php echo $artistObj->artist_name ?></option>
				<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label>Genre: </label>
				<select name="genre">
				<?php 
					$genreQuery = new GenreQuery(); 
					$genres = $genreQuery->getAll();
				?>
				<?php foreach($genres as $genreObj) : ?>
					<option value="<?php echo $genreObj->id ?>"><?php echo $genreObj->genre ?></option>
				<?php endforeach; ?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Price: </label>
				<input type="text" name="price">
			</div>
			
			<input type="submit" name="submit" class="btn btn-default" value="Submit">
		</form>
		</div>
	
	<?php 

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

			?>

			<div class="panel-footer">
			    <p>The song <?php echo $song->getTitle() ?>
	   			with an ID of <?php echo $song->getId() ?>
	 			was inserted successfully!</p>
			</div>
		
	 		<?php
		}
	}


	 ?>
	 </div>
	 </div>
</body>
</html>

