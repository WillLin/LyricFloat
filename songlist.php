<?php
	/**
	* 
	*/
	require 'song.php';
	class Songlist
	{
		private $word;
		private $song_map;
		private $song_artist_map;
		function __construct($wordname)
		{
			$this->word=$wordname;
			$this->song_map=array();
			$this->song_artist_map=array();
		}
		function reset(){
			$this->song_map=array();
			$this->song_artist_map=array();
		}
		function setWord($wordname){
			$this->word=$wordname;
		}
		function setList($songlist){
			foreach ($songlist as $song) {
				if($song->hasWord($this->word)){
					$list=$song->getWordList();
					$this->song_map[$song->getName()]=$list[$this->word];
					$this->song_artist_map[$song->getName()]=$song->getArtist();
				}
			}
			arsort($this->song_map);
			return;
		}
		function getFrequencyList(){
			return $this->song_map;
		}
		function getArtistMap(){
			return $this->song_artist_map;
		}
		function getWord(){
			return $this->word;
		}
	}
?>