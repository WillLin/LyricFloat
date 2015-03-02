<?php
session_start();
include('api_connection_setup.php');

$transferred_array = $_SESSION['allWords'];

$artist = $_GET['artist'];
				$songs_array = getAllLyrics($artist);

				$result = array();
				$result = $songs_array[0]->getWordList();
				for ($i = 1; $i < count($songs_array); $i++)
				{
					$result = array_merge($result, $songs_array[$i]->getWordList());

				}

				$newarraycount = 0;
				$newarray = array();

				foreach ($result as $key => $value) 
				{
					while ($value > 1) {
						$newarray[$newarraycount] = $key;
						$newarraycount++;
						$value--;
					}


					//echo "$key .  $value <br>";
				}

				$transferred_array = array_merge($transferred_array, $newarray);
				$_SESSION['allWords'] = $transferred_array;

?>

