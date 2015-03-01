<html>
<head>
<title>Set up a connection </title>
</head>

<body>
<?php

include('genius_api.php');
include('song.php');
// Input the artist



echo "hello" . '<br>';
$artist = "Spice 1";

$artist = preg_replace("/[\s_]/", "-", $artist);

$album_list = album_list($artist);
$song_list_by_album = array();
$songs_array = array();

for($i = 0; $i < count($album_list); $i++)
{
	echo $album_list[$i]['link'] . '<br>';

	$song_list_by_album[] = tracklist($album_list[$i]['link']);

}


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

echo count($songs_array) . '<br>';
echo $songs_array[0]->getName() . '<br>';
echo $songs_array[0]->getArtist() . '<br>';
$list1= $songs_array[0]->getWordList();
list($key1,$value1)=each($list1);
echo $key1 . ' ' . $value1 .  '<br>';


?>

</body>



</html>