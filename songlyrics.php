<html>
	<head>
		<title>LyricFloat</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<script type="text/javascript" src="scripts/hilitor.js"></script>
	</head>

	<body>
		<!-- <h1>LyricFloat - Page 2 </h1> -->
		<div id="logo">
			<a href="./"><img src="images/lyricfloat_sm.png" alt="LyricFloat" /></a>
		</div>

		<div id="content">
			<div id="lyriccontent">
				<!-- album cover goes here -->
				<?php 
					include('geniusapiv2.php');

					// get lyrics here


					$songTitle = $_GET['song'];
					$artistName = $_GET['artist'];

					$songTitle = str_replace(' ', '+', $songTitle);
					$artistName = str_replace(' ', '+', $artistName);

					// get song ID from genius
					$searchQuery = "http://api.genius.com/search?q=";
					$searchQuery .= $songTitle;
					$searchQuery .= '+';
					$searchQuery .= $artistName;

					$queryResponse = file_get_contents($searchQuery);
					$json = json_decode($queryResponse);

					$hitsArray = $json->response->hits;
					$hitsArray0 = $hitsArray[0];

					$songID = $hitsArray0->result->id;


					// get song lyrics and info
					$songArray = lyricsByID($songID);

					// print raw data
					//echo '<pre>'; print_r($songArray); echo '</pre>';


					// print song title
					echo '<h1 id="songtitle">';
					echo $songArray["title"];
					echo '</h1>';

					// print artist name
					echo '<h2 id="songartist">';
					echo $songArray["artist"]["name"];
					echo '</h2><br />';

					// print lyrics
					echo '<pre>';
					echo $songArray["lyrics"];
					echo '</pre>';

					// get the desired word
					$word = $_GET['word'];

					// highlight the desired word
					$command = "myHilitor.apply(\"$word\");";

					echo '<script type="text/javascript">'
					   , 'var myHilitor = new Hilitor("content");'
					   , $command
					   , '</script>'
					;

				?>



				<!-- <h1 id="songtitle"><?php echo $_GET['song']; ?></h1>
				<h2 id="songartist"><?php echo $_GET['artist']; ?></h2>


				<h1 id="songtitle"><?php echo $_GET['song']; ?></h1>
				<h2 id="songartist"><?php echo $_GET['artist']; ?></h2>


				<div id="songlyrics">
					<p>Lyrics</p>
					<p>Yes very</p>
					<p>So song</p>
				</div> -->
			</div>

			
			<div class="spacer">
				&nbsp;
			</div>
			
			
			<div>
				<form action="page2.php" method="get">
					<!-- <input type="hidden" name="word" value="testttt" /> -->
					<?php 
						$artist = $_GET['artist'];
						$word = $_GET['word'];
						echo "<input type=\"hidden\" name=\"artist\" value=\"$artist\" />";
						echo "<input type=\"hidden\" name=\"word\" value=\"$word\" />";
					?>
					<input class="purplebutton floatleft marginright10" type="submit" value="Song Selection">
				</form>

				<form action="storedwordcloud.php" method="get">
					<!-- <input type="hidden" name="artist" value="testttt" /> -->
					<!-- <?php 
						$artist = $_GET['artist'];
						echo "<input type=\"hidden\" name=\"artist\" value=\"$artist\" />";
					?> -->
					<input class="purplebutton floatleft" type="submit" value="Word Cloud">
				</form>
			</div>
		</div>

		</body>

</html>