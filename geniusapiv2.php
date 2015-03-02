<?php

	include('simple_html_dom_parser.php');

	/*
	* Retrive list of albums from artist's page.
	*
	* @param string $artist Name of the artist.
	* @return array Discography data (name, link)
	*/
	function album_list( $artist ){
		$html = file_get_html( 'http://genius.com/artists/' . $artist );
		
		foreach($html->find('ul.album_list li a') as $e){
			$albums[ ] = array( "name" =>  $e->plaintext, 
				"link" => "http://genius.com" . $e->href );
		}
		
		return $albums;
	}

	/*
	* Retrive lyrics of song and info about it.
	*
	* @param string $url Url of song.
	* @param bool $info Set to false if you want only lyrics.
	* @return array/string Data of song: artist, title, genre, tags (array: name, link), featurings (array: name, link), producers (array: name, link), lyrics
	*/
	function lyrics( $url, $info = TRUE ){

		$html = file_get_html( $url );
		
		if( $info === TRUE ){
		
			/* Primary info */
			$primaryInfo = $html->find( ".song_info_primary", 0 );
			$title = trim( $primaryInfo->find( ".text_title", 0 )->plaintext );
			
			// Info about artist
			$artistInfo = $primaryInfo->find( ".text_artist", 0 );
			$artist = array( "name" => trim( $artistInfo->plaintext ), "link" => $artistInfo->getAttribute( "itemid" ) );
						
			// Lyrics
			$lyrics = trim( $html->find( "div.lyrics", 0 )->plaintext );
			
			$return = array(
				"artist" => $artist,
				"title" => $title,
				"lyrics" => $lyrics
			);
		
		} else { 
			$return = trim( $html->find( "div.lyrics", 0 )->plaintext );
		}

		return $return;
	}

	/*
	* Get lyrics by song ID, alias for lyrics function.
	*
	* @param string $url Url of song.
	* @param bool $info Set to false if you want only lyrics.
	* @return array/string Data of song: artist, title, genre, tags (array: name, link), featurings (array: name, link), producers (array: name, link), lyrics
	*/
	function lyricsByID( $ID, $info = TRUE ){
		return lyrics( "http://genius.com/songs/" . $ID );
	}

?>
