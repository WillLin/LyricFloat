<?php
include('genius_api.php');
include('song.php');
// Input the artist

function getAllLyrics ($artist) {

	$artist = preg_replace("/[\s_]/", "-", $artist);

	$album_list = album_list($artist);
	$song_list_by_album = array();
	$songs_array = array();

	//$time_start = microtime_float();
	//for($i = 0; $i < count($album_list); $i++)
	for($i = 0; $i < 1; $i++)
	{
		
		//echo $album_list[$i]['link'] . '<br>';

		$song_list_by_album[] = tracklist($album_list[$i]['link']);
		
		
	}

	// $time_end = microtime_float();
	// $time = $time_end - $time_start;
	// echo "TIME: " . $time . '<br>';

	//$time_start = microtime_float();

	for($i = 0; $i < count($song_list_by_album); $i++)
	{	
		for ($j = 0; $j < count($song_list_by_album[$i]); $j++)
		{
			$song = new Song($song_list_by_album[$i][$j]['title'], $song_list_by_album[$i][$j]['artist']);
			
			//$lyrics = lyrics($song_list_by_album[$i][$j]['link'], FALSE);

			$link = substr($song_list_by_album[$i][$j]['link'], 17);

			$lyrics = lyrics($link, FALSE);

			$song->parseLyrics($lyrics);

			$songs_array[] = $song;
		}
		
	}

	return $songs_array;

}
// $time_end = microtime_float();
// $time = $time_end - $time_start;
// echo "TIME1: " . $time . '<br>';


// echo count($songs_array) . '<br>';
// echo $songs_array[0]->getName() . '<br>';
// echo $songs_array[0]->getArtist() . '<br>';
// $list1= $songs_array[0]->getWordList();
// echo $key1 . ' ' . $value1 .  '<br>';

// foreach ($list1 as $key => $value)
// {

// 	echo "$key => $value" . '<br>';

// }
//var_dump($list1);


?>
