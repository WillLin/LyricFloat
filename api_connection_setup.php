<html>
<head>
<title>Set up a connection </title>
</head>

<body>
<?php

// Input the artist

$artist = "Radiohead";

// Convert to lowercase
$artist = strtolower($artist);

// Substituite spaces with  "+"
$artist = preg_replace("/[\s_]/", "+", $artist);

// Test array for parsing
$songsHolder = array();

for ($i = 0; $i < 4; $i++) // we get max of 500 songs
{

// 4 API calls to get 500 songs (0 - 100, 100 - 200, ..., 400 - 500)
	$startValue = $i * 100;

	$artistTag = "&" . "start=" . (string)$startValue;

// call the api
	$response = "http://developer.echonest.com/api/v4/song/search?api_key=EUJOLEILYPQ1ON13P&artist=" . $artist . $artistTag . "&results=100";

// get parsed file
	$response = file_get_contents($response);

// json decode
	$response = json_decode($response);

// get songs array
	$songs = $response->response->songs;

// for each song, get title.
	for ($j = 0; $j < count($songs); $j++)
	{		

			$titleProcessed = $songs[$j]->title;

			// explode to inspect
			$processArray = explode(" ", $titleProcessed);

		//	check if the title has XX. at the beginning, if yes, strip it
			if (preg_match("/^[0-9]{2}.$/", $processArray[0]))
				{

					$titleProcessed = substr($titleProcessed, 4);
				}


			// if it has the word "Track" in it - ignore it 
			if (strpos($titleProcessed, 'Track') == true || preg_match('/track/i', $titleProcessed) == true)
				continue;

			// else, add to array
			else
				$songsHolder[] = $titleProcessed;

	}

}



// ------------------ GET THE LYRICS -------------
// (We still need a better API. The calls to this one fails occasionally).

// create array of lyrics
$lyricsArray = array();


for ($i = 0; $i < count($songsHolder); $i++)
{
	
	$song = strtolower($songsHolder[$i]);
	$song = preg_replace("/[\s_]/", "+", $song);
	// convert all song titles to appropriate format and call for each song and this artist
	$response = "http://api.chartlyrics.com/apiv1.asmx/SearchLyricDirect?";
	$response = $response . "artist=" . $artist . "&song=" . $song;

	echo "RESPONSE: " . $response . '<br>';


	$response = file_get_contents($response);

	// get only lyrics
	$lyrics = (substr($response, strpos($response, "\r\n\r\n")+4));
	
	echo "lyrics: " . $lyrics . '<br>';

	// put in array for lyrics

	$lyricsArray[] = $lyrics;

}
echo '<br>' . '<br>';




?>

</body>



</html>