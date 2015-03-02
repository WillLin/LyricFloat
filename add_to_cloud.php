<?php
//session_start();
include('api_connection_setup.php');


function add_to_cloud($artist)
{
	// grab allWords (lyrics) array from the current session
	$transferred_array = array();
	$transferred_array = $_SESSION['allWords'];

	// grab songsArray from the current session
	$stored_songs_array = array();
	$stored_songs_array = $_SESSION['songsArray'];


	//$artist = $_GET['artist'];

	// grab lyrics for current artist
	$songs_array = getAllLyrics($artist);

	$final = array();
				for ($i = 0; $i < count($songs_array); $i++)
				{

					foreach($songs_array[$i]->getWordList() as $key=>$value)
					{

							$final[] = $key;
					}


			}


	// $result = array();
	// $result = $songs_array[0]->getWordList();

	// for ($i = 1; $i < count($songs_array); $i++)
	// {
	// 	$result = array_merge($result, $songs_array[$i]->getWordList());

	// }

	// $newarraycount = 0;
	// $newarray = array();

	// foreach ($result as $key => $value) 
	// {
	// 	while ($value > 1) {
	// 		$newarray[$newarraycount] = $key;
	// 		$newarraycount++;
	// 		$value--;
	// 	}


	// 	//echo "$key .  $value <br>";
	// }

	// merge lyrics arrays together and save to the current session
	$merged_array = array_merge($transferred_array, $final);
	$_SESSION['allWords'] = $merged_array;

	// merge song list arrays together and save to the current session
	$new_songs_array = array_merge($stored_songs_array, $songs_array);
	$_SESSION['songsArray'] = $new_songs_array;

	// add new artist to artistsArray object in the current session
	$artists_array = array();
	$artists_array = $_SESSION['artistsArray'];
	$artists_array[] = $artist;

	// save new artist array to artistsArray object in the current session
	$_SESSION['artistsArray'] = $artists_array;


	return $merged_array;

}
				//header('Location: submit2.php');

?>

