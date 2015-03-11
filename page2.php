<?php

include('songlist.php');
session_start();
function countFreq($word)
{

	$songs = array();
	$songs = $_SESSION['songsArray'];

	$data_array = array();


	/*for ($i = 0; $i < count($songs); $i++)
	{
			foreach($songs[$i]->getWordList() as $key=>$value)
			{
					if ($word == $key)
					{		
							//$data_array[$songs[$i]] = $value;	
							echo $songs[$i]->getName() . $value . '<br>';
					}



			}

		//	return $data_array;
	}*/


	$lists=new Songlist($word);
	$lists->setList($songs);
	$songlist=$lists->getFrequencyList();
	$artistList = $lists->getArtistMap();
	foreach ($songlist as $songName => $frequency) {
		$artistName = $artistList[$songName];
		$formattedArtistName = str_replace(' ', '+', $artistName);
		$formattedSongName = str_replace(' ', '+', $songName);
		$url = "songlyrics.php?artist=";
		$url .= $formattedArtistName;
		$url .= "&amp;word=";
		$url .= $word;
		$url .= "&amp;song=";
		$url .= $formattedSongName;
		echo "<p><a href=\"$url\" style=\"color:white;\">";
		echo $songName . " ................................ "  . $frequency  . ' ';
		echo '</a></p>';
	}
}
?>


<html>
	<head>
		<title>LyricFloat</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>

	<body>
		<!-- <h1>LyricFloat - Page 2 </h1> -->
		<div id="logo">
			<a href="./"><img src="images/lyricfloat_sm.png" alt="LyricFloat" /></a>
		</div>

		<div id="content">
			<h2 id="searchword"><?php echo $_GET['word']; ?></h2>
			<div id="songlist">
				<!-- <p><a href="songlyrics.php?artist=test&amp;word=testtt&amp;song=Song+Title+1">Song Title 1</a>.............................<?php echo countFreq($_GET['word'])?></p>
				<p>Song Title.............................<?php echo countFreq($_GET['word'])?></p>
				<p>Song Title.............................<?php echo countFreq($_GET['word'])?></p> -->
			</div>

				<?php 


				countFreq($_GET['word']);

				?>
			<!--  Chart lyrics
			<p>this is where cloud will go</p>*/ 
			<a href="page2.php" > ?php  echo $_GET["song"];  ?> </a>
			-->
			<div class="spacer">
				&nbsp;
			</div>

			<form action="storedwordcloud.php" method="get">
				<!-- <input type="hidden" name="artist" value="testttt" /> -->
				<!--<?php 
					$artist = $_GET['artist'];
					echo "<input type=\"hidden\" name=\"artist\" value=\"$artist\" />";
				?>-->
				<input id="backbutton" class="purplebutton" type="submit" value="Back">
			</form>
		</div>

		</body>

</html>